<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table='ward';
    protected $primaryKey='wardid';
    public $timestamps=false;
}
