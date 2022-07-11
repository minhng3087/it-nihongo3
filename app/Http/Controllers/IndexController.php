<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\ProductCategory;
use App\Trails\MailTrait;
use App\Mail\SendMailOrders;
use App\Models\Options;
use App\Models\Menu;
use App\Models\CategoryMenu;
use App\Models\Pages;
use App\Models\Products;
use App\Models\Posts;
use App\Models\PostCategory;
use App\Models\Customers;
use App\Models\Filter;
use App\Models\Contact;
use App\Models\ProductAttributes;
use App\Models\ProductAttributeTypes;
use App\Models\ProductVersion;
use App\Models\Orders;
use App\Models\OrderDetail;
use App\Http\Requests\ContactRequest;
use Cart;
use JsValidator;
use DB;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;
use \Debugbar;

class IndexController extends Controller
{

    use MailTrait;


    public function __construct()
    {
        $site_info = Options::where('type', 'general')->first();
        $site_info = json_decode($site_info->content);

        $menuMain = Menu::where('id_group', 1)->orderBy('position')->get();

        $menuMainMobile = Menu::where('id_group', 2)->orderBy('position')->get();

        $menuCategory = CategoryMenu::where('parent_id', null)->orderBy('position')->get();
        $categories = Categories::where('parent_id', 0)->where('type', 'product_category')->get();
        $date = Carbon::now();
        view()->share(compact('menuMainMobile', 'menuMain', 'menuCategory', 'site_info', 'date', 'categories'));
    }

    public function getHome()
    {
        $dataContent = Pages::where('type', 'home')->first();

        $products_new = Products::active()->where('is_new', 1)->order()->take(150)->get();

        $products_hot = Products::active()->where('is_hot', 1)->order()->take(24)->get();

        $posts_hot = Posts::active()->published()->where('type', 'blog')->order()->where('hot', 1)->take(3)->get();

        return view('frontend.pages.home', compact('dataContent', 'posts_hot', 'products_hot', 'products_new'));
    }

    public function getSingleNews($slug) {
        $data = Posts::active()->published()->where('type', 'blog')->where('slug', $slug)->firstOrFail();
        $data->increment('view_count');
        $posts_hot = Posts::active()->published()->where('type', 'blog')->order()->where('hot', 1)->take(3)->get();
        $list_category = $data->category->toArray();
        Debugbar::info($list_category);
        $list_post_related = PostCategory::whereIn('id_category', $list_category)->get()->pluck('id_post')->toArray();
        $post_related = Posts::where('id', '!=', $data->id)->where('status', 1)->whereIn('id', $list_post_related)->orderBy('created_at', 'DESC')->take(6)->get();
        
        
        return view('frontend.pages.blog-detail', compact('data', 'post_related','posts_hot'));
    }

    public function getArchiveNews() {
        $data = Posts::active()->published()->where('type', 'blog')->where('status', 1)->paginate(1);
        return view('frontend.pages.blog', compact('data'));
    }

    public function getSingleProduct($slug)
    {
        $data = Products::active()->where('slug', $slug)->firstOrFail();

        $productAttributeTypes = ProductAttributeTypes::all();

        $list_category         = $data->category->pluck('id')->toArray();
        $list_post_related     = ProductCategory::whereIn('id_category', $list_category)->get()->pluck('id_product')->toArray();
        $product_same_category = Products::where('id', '!=', $data->id)->where('status', 1)->whereIn('id', $list_post_related)->orderBy('created_at', 'DESC')->take(12)->get();


        return view('frontend.pages.product-detail', compact('data', 'productAttributeTypes', 'product_same_category'));
    }

    public function getArchiveProduct($slug)
    {

    }

    public function getNewProduct() {
        $data    = Products::where('is_new', 1)->paginate(12);
        $product_hot = Products::where('is_hot', 1)->inRandomOrder()->take(4)->get();
        $filters = Filter::where('category_id', 0)->orderBy('position', 'ASC')->get();
        return view('frontend.pages.product', compact('data', 'filters','product_hot'));
    }


    public function getAjaxProduct(Request $request) {
        $product = Products::where('id', $request->id)->where('status',1)->first();
        return view('frontend.components.modal-product', compact('product'));
    }

    public function getSearch(Request $request)
    {
        if ($request->ajax()) {
            $data = Products::active()->where(function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->q . '%');
            })->order()->take(5)->get();
            return view('frontend.components.loop-search', compact('data'));
        } else {
            $id_category = Categories::where('type', 'product_category')->where('slug', $request->m)->first();
            if($id_category != null) $list_id_product = ProductCategory::whereIn('id_category', $id_category)->get()->pluck('id_product')->toArray();
            else $list_id_product = [];
            $data = Products::active()->where(function ($query) use ($request, $list_id_product) {
                if(count($list_id_product) != 0)
                    return $query->where('name', 'like', '%' . $request->q . '%')->whereIn('id', $list_id_product);
                else return $query->where('name', 'like', '%' . $request->q . '%');
            })->order()->paginate(24);
            return view('frontend.pages.search', compact('data'));
        }
    }

    public function getContact() {
        $dataContent = Pages::where('type', 'contact')->first();
        return view('frontend.pages.contact', compact('dataContent'));
    }

    public function postContact(ContactRequest $request) {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->content = $request->content;
        $contact->save();
        
        toastr()->success('Gửi liên hệ thành công');
        return back();
    }

    public function getFilterProductsAjax(Request $request)
    {
       $sort_fields = $request->sort_fields;
       $sort_type = $request->sort_type;
       $filterString = $request->filterString;
       $dataProduct  = Products::query();
    //    Debugbar::info($dataProduct);
    //    dd($filterString);
       if(!empty($filterString)) {
           $filterArray = explode('&', $filterString);
           if(!empty($filterArray)) {
                $array = [];
                foreach($filterArray as $item) {
                    $filter = explode(':', $item);
                    $param = $filter[0];
                    $value = $filter[1];
                    if ($param == 'brand') {
                        $whereBrand = explode(',', $value);
                        $dataProduct = $dataProduct->whereIn('brand_id', $whereBrand);
                    } elseif ($param == 'price') {
                        $wherePrice  = explode('-', $value);
                        $dataProduct = $dataProduct->whereBetween('regular_price', [$wherePrice[0], $wherePrice[1]]);
                    }else {
                        $attribute_types_id        = explode('-', $param);
                        $array[]                   = $attribute_types_id[1];
                        $list_key                  = explode(',', $value);
                        $list_id_product_attribute = ProductAttributes::where('id_product_attribute_types', $attribute_types_id[1])->whereIn('key', $list_key)->pluck('id_product')->toArray();
                        $dataProduct               = $dataProduct->whereIn('id', $list_id_product_attribute);
                    }
                }
           }
          
          
       }
        if(!empty($request->display_count)) {
            $dataProduct = $dataProduct->take($request->display_count);
        }

       $data = $dataProduct->get();
       return view('frontend.components.products.loop-products', compact('data'));


    }

    public function getVersionProduct(Request $request) {
        $data = ProductVersion::where('key', $request->key)->first();
        return view('frontend.components.products.product-version', compact('data'));
    }

    public function getCart()
    {
        return view('frontend.pages.cart');
    }

    public function getAddCart(Request $request) //Ajax
    {
        $idProduct   = $request->id;
        $dataProduct = Products::findOrFail($idProduct);
        $dataCart    = [
            'id'      => $dataProduct->id,
            'name'    => $dataProduct->name,
            'qty'     => 1,
            'price'   => !empty($dataProduct->sale_price) ? $dataProduct->sale_price : $dataProduct->regular_price,
            'weight'  => 0,
            'options' => [
                'image'       => $dataProduct->image,
                'slug'        => $dataProduct->slug,
              
            ],
        ];
        Cart::add($dataCart);
        return view('frontend.pages.part-header.products-cart');
       
    }

    public function getDeleteCart(Request $request) //Ajax
    {
        Cart::remove($request->id);
        return view('frontend.pages.part-header.products-cart');
       
    }

    public function postAddCart(Request $request)
    {
        $idProduct   = $request->id_product;
        $dataProduct = Products::findOrFail($idProduct);
        $dataCart    = [
            'id'      => $dataProduct->id,
            'name'    => $dataProduct->name,
            'qty'     => $request->qty,
            'price'   => $request->price,
            'weight'  => 0,
            'options' => [
                'image'       => $dataProduct->image,
                'slug'        => $dataProduct->slug,
            ],
        ];
        Cart::add($dataCart);
        toastr()->success('Thêm vào giỏ hàng thành công. ');
        return back();
    }

    public function getUpdateCart(Request $request)
    {
        Cart::update($request->id, $request->qty);
        return response()->json(Cart::get($request->id));
    }

    
    public function getRemoveCart($row)
    {
        Cart::remove($row);
        toastr()->success('Xóa thành công.');
        return back();
    }


    public function getCheckOut()
    {
        if (Cart::count()) {
            $jsValidator = JsValidator::make([
                'name'        => 'required|min:5|max:50',
                'phone'       => 'required',
                'address'     => 'required|max:250',
                'email'       => 'required|email',
                'note'        => 'max:300',
                'id_province' => 'required',
                'id_district' => 'required',
                'id_ward'     => 'required',
            ],
            [
                'name.required'        => 'Bạn chưa nhập họ tên.',
                'name.min'             => 'Họ tên không thể nhỏ hơn 5 ký tự.',
                'name.max'             => 'Họ tên không thể lớn hơn 50 ký tự.',
                'email.required'       => 'Bạn chưa nhập email.',
                'phone.required'       => 'Bạn chưa nhập số điện thoại.',
                'email.email'          => 'Email phải là một địa chỉ email hợp lệ.',
                'note.max'             => 'Nội dung không thể lớn hơn 300 ký tự.',
                'address.required'     => 'Bạn chưa nhập địa chỉ',
                'address.max'          => 'Địa chỉ không thể lớn hơn 250 ký tự.',
                'id_province.required' => 'Bạn chưa chọn Tỉnh Thành.',
                'id_district.required' => 'Bạn chưa chọn Quận Huyện.',
                'id_ward.required'     => 'Bạn chưa chọn Phường Xã.',
            ]);
            $province = DB::table('vn_province')->get();
            return view('frontend.pages.check-out', compact('province', 'jsValidator'));
        }
        toastr()->error('Chưa có sản phẩm trong giỏ hàng');
        return redirect('/');
    }

    public function getProvince(Request $request)
    {
        if ($request->type == 'district') {
            $district = DB::table('vn_district')->where('_province_id', $request->id)->get();
            echo "<option value=''>Chọn Quận / Huyện</option>";
            foreach ($district as $value) {
                echo "<option value='{$value->id}'>{$value->_name}</option>";
            }
        } else {
            $ward = DB::table('vn_ward')->where('_district_id', $request->id)->get();
            echo "<option value=''>Chọn Phường / Xã</option>";
            foreach ($ward as $value) {
                echo "<option value='{$value->id}'>{$value->_name}</option>";
            }
        }

    }

    public function postCheckOut(Request $request)
    {
        $this->initMailConfig();

        $customer              = new Customers;
        $customer->name        = $request->name;
        $customer->email       = $request->email;
        $customer->phone       = $request->phone;
        $customer->id_province = $request->id_province;
        $customer->id_district = $request->id_district;
        $customer->id_ward     = $request->id_ward;
        $customer->address     = $request->address;
        $customer->save();
        $order                 = new Orders;
        $order->id_customers   = $customer->id;
        $order->subtotal_total = Cart::priceTotal();

        $order->tax_shipping    = 0;
        $order->note            = $request->note;
        $order->type_pay        = 'COD';
        $order->status          = 1;

        $order->save();

        foreach (Cart::content() as $item) {
            $orderDetail                   = new OrderDetail;
            $orderDetail->order_id         = $order->id;
            $orderDetail->product_id       = $item->id;
            $orderDetail->product_quantity = $item->qty;
            $orderDetail->price            = $item->price;
            $orderDetail->price_total      = $item->price * $item->qty;
            $orderDetail->options          = @$item->options['attributes'];
           
            $orderDetail->save();
        }

        $dataMail = [
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'id_province' => $request->id_province,
            'id_district' => $request->id_district,
            'id_ward'     => $request->id_ward,
            'address'     => $request->address,
            'cart'        => Cart::content(),
            'total'       =>  Cart::priceTotal(),
        ];
        Mail::to($request->email)->send(new SendMailOrders($dataMail));

        Cart::destroy();
        toastr()->success('Đơn hàng của bạn đã được đặt thành công.');
        return redirect('/');
    }



}
