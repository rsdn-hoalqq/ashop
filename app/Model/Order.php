<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table='order';
    protected $primaryKey='id_order';
    protected $fillable = ["total", "id_user"];
    public $timestamps=false;
    public static function getData(){
        return
            DB::table('order')
                ->join('order_detail', 'order.id_order', '=', 'order_detail.id_order')
                ->join('products', 'order_detail.id_products', '=', 'products.pid')
                ->join('users', 'users.id', '=', 'order.id_user')
                ->select('products.*','users.*','order_detail.*','order.*')
                ->orderBy('order.id_order','DESC')
                ->get();
    }
    public static function getDetail(){
        return
            DB::table('order_detail')
                ->join('products', 'order_detail.id_products', '=', 'products.pid')
                ->select('products.*','order_detail.quantity')
                ->get();
    }
}
