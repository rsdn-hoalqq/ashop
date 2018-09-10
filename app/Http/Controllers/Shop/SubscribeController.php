<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Subs;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
class SubscribeController extends Controller
{
    public function sub(Request $request)
    {

        $data=['mail'=>$request->sub_name];
        Mail::send('auth.mail', $data, function ($msg) {
            $msg->from('mrphong678@gmail.com','PhongLuuShop');
            $msg->to(Input::get('sub_name'),'Bạn tôi')->subject('Welcome');
        });
        $arItem=array(
            'email'=>$request->sub_name,
        );

        if(Subs::insert($arItem)) {
            $request->session()->flash('msg', 'Cảm ơn bạn đã theo dõi');
            return redirect()->route('shop.index.index');
        }else{
            $request->session()->flash('msg','Có lỗi');
            return redirect()->route('shop.index.index');

        }
    }
}
