<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
class AuthController extends Controller
{
    public function getLogin(){

        return view('auth.login');
    }
    public function postLogin(Request $request){
        $username=$request->username;
        $password=$request->password;

        if(Auth::attempt(['username'=>$username,'password'=>$password])){// 'username' tên cột trong datebase

            if (Auth::check()){
                $id = Auth::user()->id_level;
                if($id ==4){
                    Auth::logout();
                    return redirect()->route('shop.index.index');

                }
            }
            return redirect()->route('admin.index.index');


        }else{
            $request->session()->flash('msg','Sai tên đăng nhập hoặc mật khẩu');
            return redirect()->route('auth.auth.login');
        }

    }
    public function logOut(){
    Auth::logout();
    return redirect()->route('auth.auth.login');
}
}
