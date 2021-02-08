<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $castsIng = [
        'ingredients' => 'array'
    ];
    
    protected $castsCat = [
        'categories' => 'array'
    ];
}
