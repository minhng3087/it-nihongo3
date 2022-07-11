<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;

class BrandController extends Controller
{
    protected function fields()
    {
        return [
            'name' => "required",
            'slug' => "required",
        ];
    }

    protected function messages()
    {
        return [
            'name.required'  => 'Tiêu đề không được bỏ trống.',
            'slug.required' => 'Đường dẫn tĩnh không được bỏ trống.'
        ];
    }


    protected function module(){
       return [
           'name' => 'Thương hiệu',
           'module' => 'brand',
           'table' => [
               'name' => [
                   'title' => 'Tên thương hiệu',
                   'with' => '',
               ],
               'slug' => [
                   'title' => 'Liên kết',
                   'with' => '',
               ]
           ]
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['module'] = $this->module();
        $data['data'] = Categories::where('type', 'brand_category')->orderBy('order', 'ASC')->orderBy('updated_at', 'DESC')->get();
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
        $data['data'] = Categories::where('type', 'brand_category')->get();
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
        $post_check_slug = Categories::where('slug', $request->slug)->where('type', 'brand_category')->first();
        if (!empty($post_check_slug)) {
            return redirect()->back()->withInput()->withErrors(['Đường đẫn tĩnh này đã tồn tại.']);
        }

        $input = $request->all();
        $input['meta_orthers'] = !empty($request->meta_orthers) ? json_encode( $request->meta_orthers ) : null;
        $input['type'] = 'brand_category';

        $data = Categories::create($input);

        toastr()->success('Thêm mới thành công.');
        return redirect()->route("{$this->module()['module']}.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['module'] = array_merge($this->module(),[
            'action' => 'update'
        ]);

        $data['categories'] = Categories::where('id', '!=', $id)->where('type', 'brand_category')->get();

        $data['data'] = Categories::findOrFail($id);

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

       $post_check_slug = Categories::where('slug', $request->slug)->where('id', '!=', $id)->where('type', 'brand_category')->first();
       if(!empty($post_check_slug)) {
           return redirect()->back()->withInput()->withErrors(['Đường dẫn tĩnh này đã tồn tại. ']);
       }

       $input = $request->all();
       $input['meta_orthers'] = json_encode( $request->meta_orthers )? json_encode( $request->meta_orthers) : null;

       Categories::findOrFail($id)->update($input);

       $this->updateOrder();
       toastr()->success('Cập nhật thành công.');

       return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id)->get_child_cate();
        if(count($category)){

            toastr()->error('Xóa thành công.');
            return redirect()->route("{$this->module()['module']}.index");
        }else {
            Categories::destroy($id);
            toastr()->success('Xóa thành công.');
            return redirect()->route("{$this->module()['module']}.index");
        }
    }

    public function updateOrder()
    {
        $data = Categories::where('type', 'brand_category')->orderBy('order', 'ASC')->orderBy('updated_at', 'DESC')->get();
        $index = 0;
        foreach ($data as $cate) {
            $index = $index + 1;
            $update = Categories::find($cate->id);
            $update->order = $index;
            $update->save();
        }
    }
}
