<?php

namespace App\Http\Controllers\Admin;

use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TypeProducts;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class TypeProductsController extends Controller
{
    public function index(Request $request){

        if ($request->ajax()){
             return datatables()->collection(TypeProducts::getPages())->toJson();
        }else{
            return view('admin.typeproducts.index');
        }
    }

    public function store(Request $request){
        $arItem=array(
            'name'=>$request->name,
            'producer_id'=>$request->producer_id,

        );
        $patUpload = $request->file('picture');
        if(!empty($patUpload))
        {
            $patUpload  =  $patUpload->store('public/files');
            $tmp=explode('/',$patUpload);
            $picture=end($tmp);
            $arItem['images']=$picture;
        }else{
            $arItem['images']='';
        }
        return json_encode(TypeProducts::insert($arItem));

    }
    public function destroy(Request $request)
    {

        $id = (int)$request->id;
        $OneUser = TypeProducts::find($id);
        $productsDell = Products::where('id_type', $OneUser->id);
        if (empty($OneUser)) {
            return;
        }
        $oldPic=$OneUser->images;
        if($oldPic!=''){
            $urlPic='files/'.$oldPic;
            Storage::delete($urlPic);
        }
        $OneUser->delete();
        $productsDell->delete();
        return json_encode(true);


    }
    public function update(Request $request){

        $id = (int)$request->id;
        $OneUser = TypeProducts::find($id);
        if(empty($OneUser)){return;}
        if($request->action =="LoadDataEdit"){
           return json_encode((array) $OneUser->toArray());
        }
        $picture=$request->picture;
        $patUpload = $request->file('picture');
        if(!empty($patUpload)){
            $patUpload = $patUpload->store('public/files');
            $tmp=explode('/',$patUpload);
            $picture=end($tmp);
            $oldPic=$OneUser->picture;
            if($oldPic!=''){
                Storage::delete('public/files/'.$oldPic);
            }
            $OneUser->images=$picture;
        }
        $OneUser->name = $request->name;
        $OneUser->producer_id = $request->producer_id;
        $OneUser->save();
      
        return json_encode($OneUser);


    }

}
