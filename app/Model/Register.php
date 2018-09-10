<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table='customers';
    protected $primaryKey='id_customer';
    public $timestamps=false;
}
