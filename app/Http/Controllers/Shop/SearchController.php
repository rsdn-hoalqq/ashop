<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products;

class SearchController extends Controller
{
    public function search(Request $request){
        $name=$request->search;

        $arItem=Products::where('name','LIKE','%'.$name.'%')->orWhere('description','LIKE','%'.$name.'%')->orWhere('detail','LIKE','%'.$name.'%')->paginate(6);
        return view('shop.search.search',['arItems'=>$arItem,'keyword'=>$name]);
    }
}
