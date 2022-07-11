<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use DataTables;
use Carbon\Carbon;
use App\Models\ProductAttributes;
use App\Models\ProductVersion;


class ProductsController extends Controller
{

    protected function module(){
        return [
            'name' => 'Sản phẩm',
            'module' => 'products',
            'table' =>[
                'image' => [
                    'title' => 'Hình ảnh', 
                    'with' => '70px',
                ],
                'name' => [
                    'title' => 'Tên sản phẩm', 
                    'with' => '',
                ],
                'price' => [
                    'title' => 'Giá', 
                    'with' => '200px',
                ],
                'brand' => [
                    'title' => 'Thương hiệu', 
                    'with' => '',
                ],
                'status' => [
                    'title' => 'Trạng thái', 
                    'with' => '200px',
                ],
            ]
        ];
    }


    protected function fields()
    {

        return [
            'name' => 'required',
            'image' => 'required',
            'regular_price' => 'required',
            "end_date_apply_gift" => "required_if:is_apply_gift,==,1",
            'category' => "required",
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được bỏ trống.',
            'image.required' => 'Bạn chưa chọn hình ảnh cho sản phẩm.', 
            'regular_price.required' => 'Bạn chưa nhập giá bán cho sản phẩm.',
            'end_date_apply_gift.required_if' => "Bạn chưa chọn ngày kết thúc khuyến mại",
            'category.required' => "Bạn chưa chọn danh mục sản phẩm",
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $list_products = Products::orderBy('created_at', 'DESC')->get();
            return Datatables::of($list_products)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" name="chkItem[]" value="' . $data->id . '">';
                })->addColumn('image', function ($data) {
                    return '<img src="' . $data->image . '" class="img-thumbnail" width="50px" height="50px">';
                })->addColumn('name', function ($data) {
                        return $data->name.'<br><a href="' . route('home.single.product', $data->slug) . '" target="_blank">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i> Link: 
                        ' . route('home.single.product', $data->slug) . '
                      </a>';
                })->addColumn('price', function ($data) {
                    $price = 'Giá bán: '.number_format($data->regular_price).'đ';
                    if(!is_null($data->sale_price)){
                        $price = $price.'<br>Giá KM:'.number_format($data->sale_price).'đ (-'.$data->sale.'%)';
                    }
                    return $price;
                })->addColumn('brand', function ($data) {
                    return @$data->Brand->name;
                })->addColumn('status', function ($data) {
                    if ($data->status == 1) {
                        $status = ' <span class="label label-success">Hiển thị</span>';
                    } else {
                        $status = ' <span class="label label-danger">Không hiển thị</span>';
                    }
                    if ($data->is_hot) {
                        $status = $status . ' <span class="label label-success">Nổi bật</span>';
                    }
                    if ($data->is_flash_sale) {
                        $status = $status . ' <span class="label label-success">Flash sale</span>';
                    }

                    if ($data->is_new) {
                        $status = $status . ' <span class="label label-success">Mới</span>';
                    }
                    
                 

                    if($data->CheckApplyGift()){
                        $status = $status . ' <span class="label label-primary">Quà tặng</span>';
                    }
                    return $status;
                })->addColumn('action', function ($data) {
                    return '<a href="' . route('products.edit', ['id' => $data->id ]) . '" title="Sửa">
                            <i class="fa fa-pencil fa-fw"></i> Sửa
                        </a> &nbsp; &nbsp; &nbsp;
                            <a href="javascript:;" class="btn-destroy" 
                            data-href="' . route('products.destroy', $data->id) . '"
                            data-toggle="modal" data-target="#confim">
                            <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
                        ';
                })->rawColumns(['checkbox', 'image', 'status', 'action', 'slug', 'name', 'price'])
                ->addIndexColumn()
                ->make(true);
        }
        $data['module'] = $this->module();
        return view("backend.{$this->module()['module']}.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['module'] = $this->module();
        $data['categories'] = Categories::where('type', 'product_category')->get();
        $data['brands'] = Categories::where('type','brand_category')->get();
        return view("backend.{$this->module()['module']}.create-edit", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->fields(), $this->messages());

        if(!empty($request->sale_price)) {
            if ($request->regular_price < $request->sale_price) {
                return redirect()->back()->withInput()->withErrors(['Giá khuyến mại không thể cao hơn giá bán']);
            }
        }

        $input = $request->all();
        $input['status'] = $request->status == 1 ??  null;
        $input['is_hot'] = $request->hot == 1 ??  null;
        $input['is_flash_sale'] = $request->is_flash_sale == 1 ?? null;
        $sale = !is_null($request->sale_price) && intval($request->sale_price) >= 0 && intval($request->regular_price) >= 0 ? (1 -intval($request->sale_price) / intval($request->regular_price)) * 100 : 0;
        $input['sale'] = $sale;
        $input['is_new'] = $request->is_new == 1 ?? null;

        $input['slug'] = $this->createSlug(str_slug($request->name));
        $input['is_apply_gift'] = $request->is_apply_gift == 1 ?? null;
        $input['content_gift'] = !empty($request->content_gift) ? json_encode( $request->content_gift ) : null;
        $input['content_services_warranty'] = !empty($request->content_services_warranty) ? json_encode( $request->content_services_warranty ) : null;
        $input['end_date_apply_gift'] = !empty($request->end_date_apply_gift) ? Carbon::createFromFormat('!d/m/Y', $request->end_date_apply_gift) : null;
        $product = Products::create($input);
        if(!empty($request->gallery)){
        	foreach ($request->gallery as $item) {
        		$product_image = new ProductImage;
        		$product_image->type = 'more_image_product';
        		$product_image->image = $item;
        		$product_image->id_product = $product->id;
        		$product_image->save();
        	}
        }

        if(!empty($request->category)){
        	foreach ($request->category as $item) {
        		ProductCategory::create(['id_category'=> $item, 'id_product'=> $product->id]);
        	}
        }

        if(!empty($request->product_attributes)){
            foreach ($request->product_attributes as $value) {
                ProductAttributes::create(
                    [
                        'id_product' => $product->id,
                        'id_product_attribute_types' => $value['id_product_attribute_types'],
                        'key' => $value['key'],
                        'value' => 0,
                    ]
                );
            }
        }

        if(!empty($request->product_version)){
            foreach ($request->product_version as $value) {
                ProductVersion::create(
                    [
                        'id_product' => $product->id,
                        'id_product_attribute_types' => $value['id_product_attribute_types'],
                        'key' => $value['key'],
                        'value' => $value['value'],
                    ]
                );
            }
        }

        toastr()->success('Thêm mới thành công.');
        return redirect()->route($this->module()['module'].'.edit', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['module'] = array_merge($this->module(),['action' => 'update']);
        $data['categories'] = Categories::where('type','product_category')->get();
        $data['brands'] = Categories::where('type','brand_category')->get();
        $data['data'] = Products::findOrFail($id);
        return view("backend.{$this->module()['module']}.create-edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, $this->fields(), $this->messages());

        if(!empty($request->sale_price)){
            if($request->regular_price < $request->sale_price){
                return redirect()->back()->withInput()->withErrors(['Giá khuyến mại không thể cao hơn giá bán']);
            }
        }

        $input = $request->all();
        
        $input['status'] = $request->status == 1 ? 1 : null;

        $input['is_hot'] = $request->hot == 1 ? 1 : null;

        $input['is_flash_sale'] = $request->is_flash_sale == 1 ? 1 : null;

        $input['is_new'] = $request->is_new == 1 ? 1 : null;


        $sale = !is_null($request->sale_price) && intval($request->sale_price) >= 0 && intval($request->regular_price) >= 0 ? (1 -intval($request->sale_price) / intval($request->regular_price)) * 100 : 0;
        
        $input['sale'] = $sale;
        
        $input['is_apply_gift'] = $request->is_apply_gift == 1 ?? null;

        $input['content_services_warranty'] = !empty($request->content_services_warranty) ? json_encode( $request->content_services_warranty ) : null;

        $input['content_gift'] = !empty($request->content_gift) ? json_encode( $request->content_gift ) : null;
        $input['end_date_apply_gift'] = !empty($request->end_date_apply_gift) ? Carbon::createFromFormat('!d/m/Y', $request->end_date_apply_gift) : null;

        $product = Products::find($id)->update($input);

        ProductImage::where('id_product', $id)->delete();

        if(!empty($request->gallery)){
        	foreach ($request->gallery as $item) {
        		$product_image = new ProductImage;
        		$product_image->type = 'more_image_product';
        		$product_image->image = $item;
        		$product_image->id_product = $id;
        		$product_image->save();
        	}
        }

        if(!empty($request->category)){
        	 ProductCategory::where('id_product', $id)->delete();
        	foreach ($request->category as $item) {
        		ProductCategory::create(['id_category'=> $item, 'id_product'=> $id]);
        	}
        }

        ProductAttributes::where('id_product', $id)->delete();
        if(!empty($request->product_attributes)){
            foreach ($request->product_attributes as $value) {
                ProductAttributes::create(
                    [
                        'id_product' => $id,
                        'id_product_attribute_types' => $value['id_product_attribute_types'],
                        'key' => $value['key'],
                        'value' => 0,
                    ]
                );
            }
        }

        ProductVersion::where('id_product', $id)->delete();
        if(!empty($request->product_version)){
            foreach ($request->product_version as $value) {
                ProductVersion::create(
                    [
                        'id_product' => $id,
                        'id_product_attribute_types' => $value['id_product_attribute_types'],
                        'key' => $value['key'],
                        'value' => $value['value'],
                    ]
                );
            }
        }

        toastr()->success('Cập nhật thành công.');

        return back()->with('active_tab', $request->active_tab);
        
    	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Products::destroy($id);
       ProductVersion::where('id_product', $id)->delete();
       toastr()->success('Xóa thành công.');
       return redirect()->back();

    }

    public function deleteMuti(Request $request)
    {
        if(!empty($request->chkItem)) {
            foreach($request->chkItem as $id) {
                Products::destroy($id);
                ProductVersion::where('id_product', $id)->delete();
            }
            toastr()->success('Xóa thành công.');
            return back();
        }
        toastr()->error('Bạn chưa chọn dữ liệu cần xóa.');
        return back();
    }


    public function getAjaxSlug(Request $request)
    {
        $slug = str_slug($request->slug);
        $id = $request->id;
        $post = Products::find($id);
        $post->slug = $this->createSlug($slug, $id);
        $post->save();
        return $this->createSlug($slug, $id);
    }

    public function createSlug($slugPost, $id = null)
    {
        $slug = $slugPost;
        $index = 1;
        $baseSlug = $slug;
        while ($this->checkIfExistedSlug($slug, $id)) {
            $slug = $baseSlug . '-' . $index++;
        }

        if (empty($slug)) {
            $slug = time();
        }

        return $slug;
    }


    public function checkIfExistedSlug($slug, $id = null)
    {
        if($id != null) { 
            $count = Products::where('id', '!=', $id)->where('slug', $slug)->count();
            return $count > 0;
        }else {
            $count = Products::where('slug', $slug)->count();
            return $count > 0;
        }
    }

}
