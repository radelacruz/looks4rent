<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    function orders(){
    	return $this-> hasMany("App\Order");
    }


}
