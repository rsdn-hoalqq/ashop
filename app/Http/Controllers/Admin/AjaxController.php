<?php

namespace App\Http\Controllers\Admin;

use App\Model\TypeProducts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Producer;

class AjaxController extends Controller {


    public function getLoaitin(Request $Request){
    	$idTheloai = $Request->idTheloai;
        $loaitin=TypeProducts::where('producer_id',$idTheloai)->get()->toArray();
       	return json_encode($loaitin);
       
    }
}
