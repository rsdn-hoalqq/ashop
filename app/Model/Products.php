<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Producer;
use App\Model\TypeProducts;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    protected $table='products';
    protected $primaryKey='pid';
    public $timestamps=false;
    public static function getItems(){
        return
            DB::table('producer')
                ->join('type_products', 'producer.producer_id', '=', 'type_products.producer_id')
                ->join('products', 'type_products.id', '=', 'products.id_type')
                ->select('products.*','type_products.name as cname','producer.produce_name  as pname','products.name  as proname')
                ->orderBy('products.pid','DESC')
                ->get();
                

    }

    public function type() {
        return $this->belongsTo("App\Model\TypeProducts", "id", "type_id");
    }

}
