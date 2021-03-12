<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table= "points";
   /* public $id;
    public $name;
    public $type;
    public $link;
   
    function __construct($param0, $param1, $param2, $param3) {
        $this->id= $param0;
        $this->name= $param1;
        $this->type= $param2;
        $this->link= $param3;
    }*/

    public function food(){
        return $this->hasMany('App\Food');
    }
}
