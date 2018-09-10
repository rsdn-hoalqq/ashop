<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Producer;
use Yajra\DataTables\Facades\DataTables;


class ProducerController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()){
            return datatables()->eloquent(Producer::query())->toJson();
        }else{
            return view('admin.producer.index');
        }

//        $data['arItems']=Producer::all();
//        return view('admin.producer.index',$data);
    }
    public function destroy(Request $request){
        $id= (int)$request->id;
        $OneUser = Producer::find($id);
        if(empty($OneUser)){return;}
        $OneUser->delete();
        return json_encode(true);

//        $arCat=Producer::find($id);
//        if($arCat->delete()){
//            $request->session()->flash('msg','Xóa thành công');
//            return redirect()->route('admin.producer.index');
//        }else{
//            $request->session()->flash('msg','Xóa thất bại');
//            return redirect()->route('admin.producer.index');
//        }
    }
    public function store(Request $request){
        $arItem=array(
            'produce_name'=>$request->userName,

        );
        $ok= Producer::insert($arItem);
        return json_encode($ok);
//        if (Producer::insert($arItem)) {
//            $request->session()->flash('msg', 'Thêm thành công');
//            return redirect()->route('admin.producer.index');
//        }else{
//            $request->session()->flash('msg','Có lỗi khi thêm');
//            return redirect()->route('admin.producer.index');
//        }
    }
//    public function edit($id, Request $request){
//        $data['arItems']=Producer::find($id);
//        return view('admin.producer.edit',$data);
//    }
    public function update(Request $request){
        $id = (int)$request->id;
        $OneUser = Producer::find($id);
        if(empty($OneUser)){return;}

        //Bác làm rùi làm lun học hỏi lun đc k bác.
        $OneUser->produce_name = $request->userName;

        $OneUser->save();
        return json_encode(['id'=>$OneUser->producer_id,'name'=>$OneUser->produce_name]);
//        $arType=Producer::find($id);
//        $arType->produce_name=$request->produce_name;
//        if($arType->update()){
//            $request->session()->flash('msg','Sửa thành công');
//            return redirect()->route('admin.producer.index');
//        }else{
//            $request->session()->flash('msg','Sửa thất bại');
//            return redirect()->route('admin.producer.edit');
//        }

    }
}
