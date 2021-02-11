<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\Factory;
use Illuminate\Http\Request;
use App\Point;

class PointsController extends Controller
{
    public function etterem(){
        
        $points=[
        new Point('McDonalds', 'Gyorsétterem', 'https://www.mcdonalds.hu/'),
        new Point('Don Pepe', 'Pizzéria', 'https://www.donpepe.hu/'),
        new Point('Burger King', 'Gyorsétterem', 'https://burgerking.hu/'),
        new Point("Amy's", 'Sütiző', 'https://i0.wp.com/blog.biostarus.com/wp-content/uploads/2017/07/poop-header.jpg?resize=720%2C340&ssl=1'),
        new Point('Hassan Gyros', 'Gyroszos' ,'https://www.netpincer.hu/restaurant/n1cr/hasan-gyros-sziget#'),
        new Point('Jacks Burger', 'Hamburgerező', 'https://www.jacksburger.hu/')
      
        
        ];

       // $data=Point::paginate();

       $data = $this->paginate($points);
        return view('pages.index')->with('points', $data);
    
}
public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
