<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Point;

class PointsController extends Controller
{
    public function etterem(){
        
        $points=[
        new Point('McDonalds', 'Gyorsétterem'),
        new Point('Don Pepe', 'Pizzéria'),
        new Point('Burger King', 'Gyorsétterem'),
        new Point("Amy's", 'Sütiző'),
        new Point('Hassan Gyros', 'Gyroszos'),
        new Point('Jacks Burger', 'Hamburgerező')
      
        
        ];

        
        return view('pages.index')->with('points', $points);
    
}
}
