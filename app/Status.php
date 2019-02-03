<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    function orders(){
    	return $this-> hasMany("App\Order");
    	// return $this-> belongsToMany("App\Order");
    	

    }
    
    // public function orders(){
    // 	return $this->belongsToMany("App\Order");
    // }

}
