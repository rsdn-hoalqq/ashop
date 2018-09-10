<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserEdit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request){
//        $data['arUsers'] = DB::table('users')->where('id_level',1)->orWhere('id_level',2)->paginate(5);
//        $data['test']=User::getLevel()->where('id_level','<','4');
//        return view('admin.user.index',$data);

        if ($request->ajax()){
            return datatables()->collection(User::getLevel()->where('id_level','<','4'))->toJson();
        }else{
            return view('admin.user.index');
        }
    }
    protected function create(Request $request){
        $arUsers=Auth::user();
        if ($arUsers->id_level!=1)
        {
            $request->session()->flash('msg', 'Bạn không có quyền thêm');
            return redirect()->route('admin.user.index');
        }
        return view('admin.user.create');
    }
    public function store(Request $request){
        $arUsers=Auth::user();
        if ($arUsers->id_level!=1)
        {
            $request->session()->flash('msg', 'Bạn không có quyền thêm');
            return json_encode(false);
        }
//        dd($request->all());
        $arItem= array(
            'username'=>trim($request->username),
            'password'=>bcrypt(trim($request->password)),
            'fullname'=>trim($request->fullname),
            'id_level'=>$request->optionsRadios,
            'email'=>$request->email,
        );
        // quyền

        $patUpload = $request->file('picture');
        if(!empty($patUpload))
        {
            $patUpload = $patUpload->store('public/files');
            $tmp=explode('/',$patUpload);
            $picture=end($tmp);
            $arItem['images']=$picture;
        }else{
            $arItem['images']='';
        }
        return json_encode(User::insert($arItem));

    }

    public function destroy(Request $request){

        $id= (int)$request->id;
        $arUserss=Auth::user();
        $arItems=User::find($id);
        if(empty($arItems)){return;}
        if ($arItems->id_level==1)
        {
            $request->session()->flash('msg','He is God, Dont die');
            return json_encode('god');
        }
        if($arItems->id != $arUserss->id && $arUserss->id_level !=1){
            return json_encode(false);
        }
        $oldPic=$arItems->images;
        if($oldPic!=''){
            $urlPic='public/files/'.$oldPic;
            Storage::delete($urlPic);
        }
        // quyền
        $arItems->delete();
        return json_encode(true);
    }

    public function update(Request $request){
        $id= (int)$request->id;
        //quyen
        $arItem=User::find($id);
        $arUser=Auth::user();
        if( $arItem->username!= $arUser->username){

            return json_encode('noedit');
        }

        if(empty($arItem)){return;}
        if($request->action =="LoadDataEditU"){
            return json_encode((array) $arItem->toArray());
        }
        $picture=$request->picture;
        if($picture!=''){
            $patUpload = $request->file('picture')->store('public/files');
            $tmp=explode('/',$patUpload);
            $picture=end($tmp);
            $oldPic=$arItem->images;
            if($oldPic!=''){
                Storage::delete('files/'.$oldPic);
            }
            $arItem->images=$picture;
        }



        $arItem->username=trim($request->username);
        $arItem->password=bcrypt(trim($request->password));
        $arItem->fullname=$request->fullname;
        return json_encode($arItem->save());

    }
    public function AjaxCheckEmail(Request $Request){
        $email = $Request->email;
        $count = User::select('email')->whereEmail($Request->email)->count();
        if($count >0){
            return json_encode(false);
        }else{
            return json_encode(true);
        }
    }

}