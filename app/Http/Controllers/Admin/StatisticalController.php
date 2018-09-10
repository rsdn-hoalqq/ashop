<?php

namespace App\Http\Controllers\Admin;

use App\Model\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    public function countProducts(){
      $date=getdate();
      $day=$date['mday'];
      $mon=$date['mon'];
      $year=$date['year'];

      $getDate=\App\Model\ModelDetail::select('order_detail.*','products.name')
      ->join('products','products.pid','=','order_detail.id_products')
      ->whereDate('order_detail.created_at',$year.'-'.$mon.'-'.$day)->orderBy('id_detail','desc')->get();
      $sumDate=\App\Model\ModelDetail::whereDate('created_at',$year.'-'.$mon.'-'.$day)->sum('quantity');

      $getMonth=\App\Model\ModelDetail::select('order_detail.*','products.name')
      ->join('products','products.pid','=','order_detail.id_products')
      ->whereMonth('order_detail.created_at',$mon)->orderBy('id_detail','desc')->get();
      $sumMonth=\App\Model\ModelDetail::whereMonth('created_at',$mon)->sum('quantity');

       $getYear=\App\Model\ModelDetail::select('order_detail.*','products.name')
      ->join('products','products.pid','=','order_detail.id_products')
      ->whereYear('order_detail.created_at',$year)->orderBy('id_detail','desc')->get();

       $sumYear=\App\Model\ModelDetail::whereYear('created_at',$year)->sum('quantity');

        $soluongnhapthangtruoc = Products::select('soluong')->wheremonth('created_at',$mon-1)->sum('soluong');
        $soluongbanthangtruoc=\App\Model\ModelDetail::whereMonth('created_at',$mon-1)->sum('quantity');
        $hangthangnay = Products::select('soluong')->wheremonth('created_at',$mon)->sum('soluong');

        $b=($soluongnhapthangtruoc-$soluongbanthangtruoc)+($hangthangnay-$sumMonth);

        $hangnhaptheotenthangtruoc= Products::select('name')->wheremonth('created_at',$mon-1)->groupBy('name');

//        $slhangnhapthangnaytheoten= \DB::table('products')
//            ->selectRaw('pid, sum(soluong) as sum')
//            ->wheremonth('created_at', $mon)
//            ->groupBy('pid')->get();
//        $slhangnhapthangtruoctheoten= \DB::table('products')
//            ->selectRaw('pid, sum(soluong) as sum')
//            ->wheremonth('created_at', $mon-1)
//            ->groupBy('pid')->get();
//        $soluongbanthangtruoctheoten= \DB::table('order_detail')
//            ->selectRaw('id_products, sum(quantity) as sum')
//            ->wheremonth('created_at', $mon-1)
//            ->groupBy('id_products')->get();
//        $soluongbanthangnaytheoten= \DB::table('order_detail')
//            ->selectRaw('id_products, sum(quantity) as sum')
//            ->wheremonth('created_at', $mon)
//            ->groupBy('id_products')->get();
//      $fb=  DB::select(DB::raw('select products.name,id_products,(products.soluong-sum(quantity)) as tonkho from order_detail left join products 
//on order_detail.id_products = products.pid group by id_products'));
//        dd($fb);






        return view('admin.statistical.index',['getDate'=>$getDate,'sumDate'=>$sumDate,'getMonth'=>$getMonth,'sumMonth'=>$sumMonth,'getYear'=>$getYear,'sumYear'=>$sumYear]);
    }
}
