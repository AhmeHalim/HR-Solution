<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class Employee extends Model
{
    //
    protected $table='employees';

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    
}
