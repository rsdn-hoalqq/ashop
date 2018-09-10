<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\District;
use App\Model\Ward;

class AjaxController extends Controller
{
    public function getDistrict(Request $request){
        $idTheloai = $request->idProvince;
        $loaitin=District::where('provinceid',$idTheloai)->get()->toArray();
        return json_encode($loaitin);

    }
    public function getWard(Request $request){
        $idCommune = $request->idCommune;
        $loaitin=Ward::where('districtid',$idCommune)->get()->toArray();
        return json_encode($loaitin);
    }
}
