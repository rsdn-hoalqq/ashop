<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Review;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
class ReviewController extends Controller
{
    public function index(Request $request){
//        $data['getReview']=Review::getReview();
//        return view('admin.review.index',$data);
        if ($request->ajax()){
            return datatables()->collection(Review::getReview())->toJson();
        }else{
            return view('admin.review.index');
        }
    }
    public function active(Request $request){

        $finds=Review::find($request->idRead);
        if($finds->active==0)
        {
            $data['item']=  DB::table('review')
                ->where('id',$finds->id )
                ->update(['active' => 1]);
        }
        else{
            $data['item'] = DB::table('review')
                ->where('id',$finds->id )
                ->update(['active' => 0]);

        }

        $data['item'] = DB::table('review')->where('id',$finds->id )->first();
        return json_encode($data['item']);

//        return response()->json([
//            "status" => true,
//            "html" => view("admin.review._ajaximg",$data)->render(),
//        ]);

    }
    public function destroy(Request $request){

        $id= (int)$request->id;
        $OneUser = Review::find($id);
        if(empty($OneUser)){return;}
        $OneUser->delete();
        return json_encode(true);
    }
}
