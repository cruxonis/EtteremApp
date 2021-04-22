<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table= "foods";
    public $incrementing = false;

    protected $casts = [
        'ingredients' => 'array', 'categories' => 'array'
    ];
    
   


    public function points(){
        return $this->belongsTo('App/Point');
    }

}
