<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table= "foods";

    protected $casts = [
        'ingredients' => 'array', 'categories' => 'array'
    ];
    
   


    public function points(){
        return $this->belongsTo('App/Point');
    }

}
