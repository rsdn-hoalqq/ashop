<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    protected $table='contact';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $dates = ['deleted_at'];
}
