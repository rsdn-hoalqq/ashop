<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $table='producer';
    protected $primaryKey='producer_id';
    public $timestamps=false;
//    public function post() {
//        return $this->hasMany('App\Model\TypeProducts','producer_id','producer_id');
//    }
    public function post() {
        return $this->hasMany('App\Model\TypeProducts','producer_id','producer_id');
    }
}
