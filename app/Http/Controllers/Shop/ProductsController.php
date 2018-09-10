<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Producer;
use App\Model\TypeProducts;
use App\Model\Products;
use Illuminate\Support\Facades\DB;
use App\Model\Review;
class ProductsController extends Controller
{
    public function index($slug, $id, Request $request){
        //Sắp xếp
        switch ($request->order_id) {
            case 1:
                $column_sort= "promotion_price";
                $sort_value= "ASC";
                break;
            case 2:
                $column_sort= "promotion_price";
                $sort_value= "DESC";
                break;
            case 4:
                $column_sort= "count_view";
                $sort_value= "DESC";
                break;
            default:
                $column_sort=  "pid";
                $sort_value=  "DESC";
        }
// TÌm theo giá radiobuton
        $products = Products::select('*');
        $brand = (array) $request->brand;
        if(!empty($brand)){
             $products  = $products->whereIn('id_type',$brand);
        }else{
              $products  = $products->where('id_type',$id);
        }
        switch ($request->price) {
            case 5:
                $products = $products->where('promotion_price', '<', 1000000);
                break;
            case 6:
                $products = $products->whereBetween('promotion_price', [1000000, 3000000]);
                break;
            case 7:
                $products = $products->whereBetween('promotion_price', [3000000, 7000000]);
                break;
            case 8:
                $products = $products->whereBetween('promotion_price', [7000000, 10000000]);
                break;
            case 9:
                $products = $products->where('promotion_price', '>', 10000000);
                break;
        }

       
        $data['arItems']=$products->orderBy($column_sort,$sort_value)->paginate(6);
        $data['arTypes']=TypeProducts::find($id);
        $show=TypeProducts::find($id);
        $data['aaaa']=TypeProducts::where('producer_id',$show->producer_id)->first();
        $data["slug"] = $slug;
        $data["id"] = $id;
        if ($request->ajax()) {
            return response()->json([
                "status" => true,
                "html" => view('shop.products._products',$data)->render()
            ]);
        }
        return view('shop.products.index',$data);
    }
    public function detail($lug,$id){
            $arDetails=Products::find($id);
         DB::table('products')
            ->where('pid', $arDetails->pid)
            ->update(['count_view' =>$arDetails->count_view+1 ]);
            $arSames=Products::where('id_type',$arDetails->id_type)->take(5)->get();
            $reviews=Review::where('id_products',$id)->where('active',1)->get();
        return view('shop.products.detail',['arSames'=>$arSames,'arDetails'=>$arDetails,'reviews'=>$reviews]);
    }
    public function review(Request $request){
        $pid=$request->pid;
        $name=$request->name;
         $email=$request->email;
         $commet=$request->comment;
            $arReview=array(
                'your_name'=>$name,
                'email'=>$email,
                'comment'=>$commet,
                'id_products'=>$pid
            );
        Review::insert($arReview);

    }

}
