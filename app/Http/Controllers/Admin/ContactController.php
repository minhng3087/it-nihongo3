<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Products;
use App\Models\Posts;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;


class ContactController extends Controller
{

	protected function module(){
        return [
            'name' => 'Liên hệ',
            'module' => 'contact',
            'table' =>[
                'name_customers' => [
                    'title' => 'Tên khách hàng', 
                    'with' => '',
                ],
                'phone_customers' => [
                    'title' => 'Số điện thoại', 
                    'with' => '',
                ],
                'email_customers' => [
                    'title' => 'Email', 
                    'with' => '',
                ],
                'content' => [
                    'title' => 'Nội dung', 
                    'with' => '',
                ],
                'status' => [
                    'title' => 'Trạng thái', 
                    'with' => '100px',
                ],
                'created_at' => [
                    'title' => 'Ngày đăng', 
                    'with' => '',
                ],
            ]
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
        
    }

    public function anyData(Request $request) {
        $contact = Contact::orderBy('created_at', 'DESC')->get();
        return Datatables::of($contact)
            ->addColumn('checkbox', function ($data) {
                return '<input type="checkbox" name="chkItem[]" value="' . $data->id . '">';
            })->addColumn('name_customers', function ($data) {
                return $data->name;
            })->addColumn('phone_customers', function ($data) {
                return $data->phone;
            })->addColumn('email_customers', function ($data) {
                return $data->email;
            })->addColumn('created_at', function ($data) {
                return $data->created_at->format('d/m/Y H:i:s');
            })->addColumn('content', function ($data) {
                return html_entity_decode(text_limit(strip_tags($data->content), 10).'...');
            })->addColumn('status', function ($data) {
                if ($data->status == 1) {
                    $status = ' <a href="javascript:;" class="activeq" data-id="'.$data->id.'"><span class="label label-success">Đã duyệt</span></a>';
                }else {
                    $status = ' <a href="javascript:;" class="activeq" data-id="'.$data->id.'"><span class="label label-danger">Chưa duyệt</span></a>';
                }
                return $status;
            })->addColumn('action', function ($data) {
                return '<a href="' . route('contact.edit', ['id' => $data->id]) . '" title="Chi tiết" class="btn btn-success btn-sm">
                         Chi tiết
                    </a> &nbsp; &nbsp; &nbsp;';
            })->rawColumns(['checkbox', 'status', 'action', 'name'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Contact::findOrFail($id);
        $data['module'] = array_merge($this->module(),[
            'action' => 'update',
        ]);
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
       	$data = Contact::findOrFail($id);
       	$data->content = $request->content;
       	$data->status  = $request->status ?? 0;
       	$data->save();
        toastr()->success('Cập nhật thành công.');
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
        Contact::destroy($id);
        toastr()->success('Xóa thành công.');
        return back();
    }


    public function deleteMuti(Request $request)
    {
        if(!empty($request->chkItem)){
            foreach ($request->chkItem as $id) {
                Contact::destroy($id);
            }
            toastr()->success('Xóa thành công.');
            return back();
        }
        toastr()->error('Bạn chưa chọn dữ liệu cần xóa.');
        return back();
    }


    public function getQuickActive(Request $request)
    {
        $data = Contact::findOrFail($request->id);
        if($data->status == 1){
            $data->status = 0;
            $data->save();
            return '<span class="label label-danger">Chưa duyệt</span>';
        }else{
            $data->status = 1;
            $data->save();
            return '<span class="label label-success">Đã duyệt</span>';
        }
    }
}
