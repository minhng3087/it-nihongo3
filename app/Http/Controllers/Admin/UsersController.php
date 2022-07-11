<?php 
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Input, File;
use Validator;
use Auth;
use DB,Hash;
class UsersController extends Controller
{
    public function index()
    {
        $data = DB::table('user')->select()->first();
        return view('backend.users.edit', compact('data'));
    }
     public function khongquyen()
    {
        return view('backend.users.khongquyen', compact('data'));
    }
    public function getAdmin()
    {
        $id_user=Auth::user()->id;
        $data = DB::table('users')->select()->where('id', $id_user)->get()->first();
        return view('backend.users.admin', compact('data'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    /** Phân quyền **/
     public function listuse()
    {
        $data = DB::table('users')->select()->whereIn('level',[1,3])->paginate(20);
       return view('backend.users.listuse', compact('data'));  
    } 
     public function edituse(Request $request)
    {
        $id= $request->get('id');
        $data = DB::table('users')->select()->where('id', $id)->get()->first();
        $data = Users::find($id);
        if($request->get('hienthi')>0){
            if($data->status == 1){
                $data->status = 0; 
            }else{
                $data->status = 1; 
            }
            $data->update();
            return redirect()->route('backend.users.listuse')->with('status','Cập nhật thành công !');
        }
       return view('backend.users.edituse', compact('data'));
    }
      public function postedituse(Request $request)
    {
        $this->validate($request,
            ["txtName" => "required"],
            ["txtName.required" => "Bạn chưa nhập tên"],
            ['txtPasswordNew' => 'min:8|confirmed'],
            ["txtPasswordNew.length" => "Mật khẩu ít nhất 8 ký tự"],
            ["txtPassword" => "required"],
            ["txtPassword.required" => "Bạn chưa nhập lại mật khẩu"]
        );
        $id= $request->get('id');
        $data = Users::find($id);
        if(!empty($data)){
            $data->name = $request->txtName;
            if(!empty($request->txtPasswordNew)){
                $data->password = Hash::make($request->txtPasswordNew);
            }
            $data->address = $request->txtAddress;
            $data->level = $request->level;
            $data->phone = $request->txtPhone;
            $data->email = $request->txtEmail;
            if(isset($_POST['autho'])){
                $number = $_POST['autho'];
                $data->autho = implode(',', $number);
            }
            // if($request->status=='on'){
            //     $product->status = 1;
            // }else{
            //     $product->status = 0;
            // }
            $data->save();
            return redirect('backend/users/edituse?id='.$data->id)->with('status','Cập nhật thành công');
        }else{
            return redirect('backend/')->with('status','Cập nhật dữ liệu lỗi');
        }
    } 
        public function posuse(Request $request)
    {
        $id_user=Auth::user()->id;
        $data = DB::table('users')->select()->where('id', $id_user)->get()->first();
        if($data->level == 1 || $data->level == 3){
        	$thanhvien = new Users;
            $thanhvien->name = $request->name;
         	$thanhvien->user_name = $request->username;
        	$thanhvien->email = $request->email;
            $thanhvien->phone = $request->phone;
            $thanhvien->level = $request->level;
            if(isset($_POST['autho'])){
                $number = $_POST['autho'];
                $thanhvien->autho = implode(',', $number);
            }
        	$thanhvien->password = Hash::make($request->password);
        	$thanhvien->remember_token = $request->_token;
        	$thanhvien->save();  
        }
    	return redirect()->route('backend.users.listuse')->with('status','Thêm tài khoản thành công!');
    }
     public function adduse()
    {
        $id_user=Auth::user()->id;
        $data = DB::table('users')->select()->where('id', $id_user)->get()->first();
        return view('backend.users.adduse', compact('data'));
    }
       public function deleteuse($id)
    {
        $data = Users::find($id);
        $data->delete();
       return redirect()->route('backend.users.listuse')->with('status','Xóa thành công');
    }
    /** End phân quyền **/
    public function updateinfo(Request $request)
    {
        $this->validate($request,
            ["txtName" => "required"],
            ["txtName.required" => "Bạn chưa nhập tên"],
            ['txtPasswordNew' => 'min:8|confirmed'],
            ["txtPasswordNew.length" => "Mật khẩu ít nhất 8 ký tự"],
            ["txtPassword" => "required"],
            ["txtPassword.required" => "Bạn chưa nhập lại mật khẩu"]
        );
        $id_user = Auth::user()->id;
        $data = Users::find($id_user);
        if(!empty($data)){
            $img = $request->file('fImages');
            if(!empty($img)){
                $path_img='upload/users';
                $img_name=$img->getClientOriginalName();
                $img->move($path_img,$img_name);
                $data->photo = $img_name;
            }
            $data->name = $request->txtName;
            if(!empty($request->txtPasswordNew)){
                $data->password = Hash::make($request->txtPasswordNew);
            }
            $data->address = $request->txtAddress;
            $data->phone = $request->txtPhone;
            $data->email = $request->txtEmail;
            // if($request->status=='on'){
            //     $product->status = 1;
            // }else{
            //     $product->status = 0;
            // }
            $data->save();
            return redirect('backend/users/info')->with('status','Cập nhật thành công');
        }else{
            return redirect('backend')->with('status','Cập nhật dữ liệu lỗi');
        }
    }
    public function AuthRouteAPI(Request $request){
        return $request->user();
    }
}
