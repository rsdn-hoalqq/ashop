<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
class AccountController extends Controller
{
    public function index(Request $request){
//        $data['lists']=User::where('id_level',4)->get();
//        return view('admin.account.account',$data);
        if ($request->ajax()){
            return datatables()->collection(User::where('id_level',4)->get())->toJson();
        }else{
            return view('admin.account.account');
        }
    }
    public function destroy(Request $request){
        $id= (int)$request->id;
        $OneUser = User::find($id);
        if(empty($OneUser)){return;}
        $OneUser->delete();
        return json_encode(true);
    }
}
