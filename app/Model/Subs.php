<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subs extends Model
{
    protected $table='subscribe';
    protected $primaryKey='id_subs';
    public $timestamps=false;
}
