<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $head='Mai ajánlatunk!';
        

        return view('pages.index')->with('head', $head);

    }
}
