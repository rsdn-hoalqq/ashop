<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    protected $table='review';
    protected $primaryKey='id';
    public $timestamps=false;
    public static function getReview(){
        return
            DB::table('products')
                ->join('review', 'review.id_products', '=', 'products.pid')
                ->select('products.*','review.*')
                ->orderBy('review.id','DESC')
                ->get();

    }

}
