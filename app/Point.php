<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
   public $name='Meki';
   public $type;
   
   function __construct($param1, $param2) {
        $this->name= $param1;
        $this->type= $param2;
    }
}
