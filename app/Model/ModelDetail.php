<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelDetail extends Model
{
    protected $table='order_detail';
    protected $primaryKey='id_detail';
    public $timestamps=false;
    public static function getBills(){
        return
            DB::table('order')
                ->join('users', 'order.id_user', '=', 'users.id')
                ->join('order_detail', 'order_detail.id_order', '=', 'order.id_order')
                ->join('products', 'products.pid', '=', 'order_detail.id_products')




                ->select('order.*','products.*','products.name as name_product','order.id_order as ido')
//                ->orderBy('products.pid','DESC')
                ->get();

    }

}
