<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class User extends Model
{
    protected $table='users';
    protected $primaryKey='id';
    public $timestamps=false;

    public static function getLevel(){
        return
            DB::table('users')
                ->join('level', 'users.id_level', '=', 'level.id_level')
                ->select('users.*','level.*')
                ->get();

    }
}
