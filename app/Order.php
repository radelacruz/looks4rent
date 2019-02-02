<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function status(){
    	return $this->belongsTo("App\Status");
    }

    function accomodations(){ 
    	return $this->belongsToMany("\App\Accomodation")->withPivot("quantity")->withTimeStamps();
    }

    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }


    // function users(){ 
    // 	return $this->belongsToMany("\App\User")->withPivot("firstname")->withTimeStamps();
    // }

    
}
