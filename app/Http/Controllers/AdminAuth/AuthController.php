<?php 
namespace App\Http\Controllers\AdminAuth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\UserAdminRequest;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/
	protected $redirectTo = '/backend';
	use AuthenticatesUsers;
	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}
	public function getRegister()
    {
        return view('backend.auth.register');
    }
    public function postRegister(RegisterAdminRequest $request)
    {
    	$thanhvien = new User;
    	$thanhvien->user_name = $request->username;
    	$thanhvien->name = $request->name;
    	$thanhvien->email = $request->email;
    	$thanhvien->password = Hash::make($request->password);
    	$thanhvien->remember_token = $request->_token;
    	$thanhvien->save();
    	return redirect('backend/login');
    }
    public function getLogin()
    {
        return view('backend.auth.login');
    }
    public function postLogin(UserAdminRequest $request)
    {
        $auth = array(
        	'user_name' => $request->username,
        	'password' => $request->password,
        	'level' => 1,
            'status' => 1
        );   
        $remember = $request->remember ? true : false;
        if (Auth::attempt($auth, $remember)) {
            return redirect('backend')->with('flash_notice', 'Đăng nhập thành công.');;
        }else{
            return redirect('backend/login')->with('flash_error', 'Tên đăng nhập hoặc mật khẩu không đúng.')
            ->withInput();;
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('backend.auth.getLogin');
    }
}
