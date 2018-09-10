<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Contact;

class ContactController extends Controller
{
    public function getContact(){
        return view('shop.contact.contact');
    }
    public function postContact(Request $request){
        $arItem=array(
            'fullname'=>$request->ContactFormName,
            'email'=>$request->ContactFormEmail,
            'comment'=>$request->ContactFormMessage,
            'phone'=>$request->ContactFormPhone,

        );
        if (Contact::insert($arItem)) {
            $request->session()->flash('msg', 'Cảm ơn bạn đã góp ý');
            return redirect()->route('shop.contact.contact');
        }else{
            $request->session()->flash('msg','Có lỗi!!!');
            return redirect()->route('shop.contact.contact');
        }
    }
}
