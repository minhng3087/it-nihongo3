<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductAttributeTypes;


class ProductAttributeTypesController extends Controller
{
    protected function fields()
    {
       return [
        'name' => 'required',
       ];
    }

    protected function messages()
    {
       return [
        'name.required'  => 'Tên thuộc tính không được bỏ trống.',
       ];
    }


    protected function module(){
        return [
            'name' => 'Thuộc tính sản phẩm',
            'module' => 'product-attributes',
            'table' => [
                'name' => [
                    'title' => 'Tiêu đề', 
                    'with' => '',
                ],
                'slug' => [
                    'title' => 'Liên kết', 
                    'with' => '',
                ],
                'status' => [
                    'title' => 'Trạng thái', 
                    'with' => '200px',
                ],
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
       $data['data'] = ProductAttributeTypes::all();
       return view("backend.{$this->module()['module']}.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       abort(404);
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
        $input = $request->all();
        $input['slug'] = str_slug($request->name);
        $post_check_slug = ProductAttributeTypes::where('slug', $input['slug'])->first();
        if(!empty($post_check_slug)) {
            return redirect()->back()->withInput()->withErrors(['Thuộc tính này đã tồn tại.']);
        }
        ProductAttributeTypes::create($input);
        toastr()->success('Thêm mới thành công.');
        return back();
        
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
        $data['data'] = ProductAttributeTypes::findOrFail($id);
        $data['module'] = $this->module();
        return view("backend.{$this->module()['module']}.edit", $data);
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
        $input = $request->all();
        $input['slug'] = str_slug($request->name);
        $post_check_slug = ProductAttributeTypes::where('slug', $input['slug'])->where('id', '!=', $id)->first();
        if(!empty($post_check_slug)) {
            return redirect()->back()->withInput()->withErrors(['Thuộc tính này đã tồn tại.']);
        }
        ProductAttributeTypes::findOrFail($id)->update($input);
        toastr()->success('Thêm mới thành công.');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductAttributeTypes::destroy($id);
        toastr()->success('Xóa thành công.');
        return back();
    }

}
