<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
   public $name;
   public $type;
   public $link;
   
   function __construct($param1, $param2, $param3) {
        $this->name= $param1;
        $this->type= $param2;
        $this->link= $param3;
    }
}
