<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Queue\Jobs\DatabaseJob;
use App\Model\Products;
use App\Model\Producer;
use App\Model\TypeProducts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductsController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()){
            return datatables()->collection(Products::getItems())->toJson();
        }else{
            return view('admin.products.index');
        }
    }
    public function edit($id){
        $data['arItems']=Products::find($id);
        return view('admin.products.edit',$data);
    }

    public function update(Request $request){
        $id = (int)$request->id;
        $arItem=Products::find($id);
        if(empty($arItem)){return;}
        if($request->action =="LoadDataEditP"){
            return json_encode((array) $arItem->toArray());
        }
        $picture=$request->picture;
        $patUpload = $request->file('picture');
        if(!empty($patUpload)){
            $patUpload = $patUpload->store('public/files');
            $tmp=explode('/',$patUpload);
            $picture=end($tmp);
            $oldPic=$arItem->picture;
            if($oldPic!=''){
                Storage::delete('public/files/'.$oldPic);
            }
            $arItem->image=$picture;
        }

        $arItem->name=$request->ten;
        $arItem->id_type=$request->id_type;
        $arItem->producer_id=$request->producer_id;
        $arItem->unit_price=$request->gia;
        $arItem->promotion_price=$request->giam;
        $arItem->soluong=$request->sl;
        $arItem->description=$request->mota;
        $arItem->detail=$request->chitiet;
        return json_encode($arItem->save());

    }
    public function store(Request $request){

        $arItem=array(
            'name'=>$request->ten,
            'id_type'=>$request->id_type,
            'producer_id'=>$request->producer_id,
            'unit_price'=>$request->gia,
            'promotion_price'=>$request->giam,
            'soluong'=>$request->sl,
            'description'=>$request->mota,
            'detail'=>$request->chitiet,
        );
      
         $patUpload = $request->file('picture');
        if(!empty($patUpload))
        {
          $patUpload  =  $patUpload->store('public/files'); 
            $tmp=explode('/',$patUpload);
            $picture=end($tmp);
            $arItem['image']=$picture;
        }else{
            $arItem['image']='';
        }
        return json_encode(Products::insert($arItem));
    
    }


    public function destroy(Request $request){

        $id= (int)$request->id;


        $arItems=Products::find($id);
        if(empty($arItems)){return;}

        $oldPic=$arItems->image;
        if($oldPic!=''){
            $urlPic='files/'.$oldPic;
            Storage::delete($urlPic);
        }
        $arItems->delete();
        return json_encode(true);
//        if ($arItems->delete()) {
//            $request->session()->flash('msg', 'Xóa thành công');
//            return redirect()->route('admin.products.index');
//        }else{
//            $request->session()->flash('msg','Có lỗi khi xóa');
//            return redirect()->route('admin.products.index');
//        }

    }

}
