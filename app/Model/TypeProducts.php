<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use  Illuminate\Support\Facades\DB;


class TypeProducts extends Model
{
    protected $table='type_products';
    protected $primaryKey='id';
    public $timestamps=false;
    public static function getPages(){
        return
            DB::table('type_products as n')
                ->join('producer as c', 'c.producer_id','=','n.producer_id')
                ->select('n.*','produce_name as pname')->get();

    }
    public function category() {
        return $this->belongsTo('App\Model\Producer','producer_id','producer_id');
    }
}
