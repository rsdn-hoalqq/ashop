<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Register;
use App\Model\User;

class RegisterController extends Controller
{
    public function getRegister(){
        return view('shop.register.index');
    }
    public function postRegister(Request $request){
        $arItem= array(
            'fullname'=>$request->fullname,
            'phone'=>$request->phone,

            'password'=>bcrypt(trim($request->password)),
            'email'=>$request->email,
            'id_level'=>4,
        );
        if (User::insert($arItem)) {
            $request->session()->flash('msg', 'Thêm thành công');
            return redirect()->route('shop.register.index');
        }else{
            $request->session()->flash('msg','Có lỗi khi thêm');
            return redirect()->route('shop.register.index');
        }
    }

    //Check Email
    public function AjaxCheckEmail(Request $Request){
        $email = $Request->email;
        $count = User::select('email')->whereEmail($Request->email)->count();
        if($count >0){
            return json_encode(false); // json nayf no tra ve ntn ma no hieu vay b? mở document của validate lên đọc oke ^^  validate của jqurey
        }else{
            return json_encode(true);
        }
    }
}
