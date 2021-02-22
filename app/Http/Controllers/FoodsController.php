<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodsController extends Controller
{
    public function index(){
        return view('pages.etelform');
    } 
}
