<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use  App\Model\Register;
use Illuminate\Support\Facades\Session;

class LoginPubController extends Controller
{
    public function getLoginPublic(){
        return view('shop.login.login');
    }
    public function postLoginPublic(Request $request){
        $username=$request->email;
        $password=$request->password;


        if(Auth::attempt(['email'=>$username,'password'=>$password])){// 'username' tên cột trong datebase
//            $request->session()->flash('msg','Oke');
            if(Session::has('message')){
                return redirect()->route('shop.cart.checkout');
            }
            else{
                return redirect()->route('shop.index.index');
            }



        }else{
            $request->session()->flash('msg','Sai tên đăng nhập hoặc mật khẩu');
            return redirect()->route('shop.login.login');
        }

    }
    public function logOutList(){
        Auth::logout();
        return redirect()->route('shop.login.login');
    }
}


