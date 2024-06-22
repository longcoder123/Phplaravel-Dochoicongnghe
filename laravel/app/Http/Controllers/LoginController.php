<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function Login(){
        
        return view('frontend.Login');
    }
    public function loginad(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        if ($email === 'admin@gmail.com' && $password === 'admin') {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }}
    public function register(){
        
        return view('frontend.register');
    }

    //Register
    public function postRegister(Request $request){
        //validate
       
        $request->merge(['password'=> Hash::make($request -> password)]);// mã hóa mật khẩu
        try{
            User::create($request->all());
        } catch(\Throwable $th){
        
        }
       return redirect()->route('login');
    }

   // Trong LoginController.php

public function postLogin(Request $request){
    //validate
    
    if(Auth::attempt(['email'=> $request->email , 'password'=>$request->password])){
        // Thêm thông tin người dùng vào session
        Session::put('user', Auth::user());

        // Lấy người dùng hiện tại
        $user = Auth::user();

        // Kiểm tra xem người dùng có giỏ hàng hay không
        if ($user->cart) {
            // Xóa giỏ hàng của người dùng cũ
            $user->cart->delete();
        }

        return redirect()->route('home');
    }
    return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không đúng ');
}

    
    //logout
    public function logout(){
        
        Auth::logout();
    return redirect()->route('login');
       
    }
}
