<?php

namespace App\Http\Controllers\Shop;

use App\Model\TypeProducts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products;

class IndexController extends Controller
{
    public function index(){
       $data['arItems']=Products::all()->sortByDesc('pid')->take(6);
       $data['views_limit']=Products::all()->sortByDesc('count_view')->take(6);
       $data['type']=TypeProducts::all();
        return view('shop.index.index',$data);
    }
}
