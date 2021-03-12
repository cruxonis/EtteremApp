<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\Factory;
use App\Food;
use App\Point;
use DB;

class FoodsController extends Controller
{
    

    public function form(){
        $data= Point::all();
        return view('pages.etelform')->with('points', $data);
    }
    public function store(Request $request){

        $this->validate($request, [
            'title'=> 'required|min:3|unique:foods,name'
        ]);
        $categ=$request->input('categories');
        $categArr= explode(',',$categ);
        $ing=$request->input('ingredients');
        $ingArr= explode(',',$ing);
        
        //Create Post
        $food=new Food;
        $food->name=$request->input('title');
        $food->price=$request->input('price');
        $food->description=$request->input('description');
        $food->ingredients=$ingArr;
        $food->categories=$categArr;
        $food->point_id=$request->input('item_id');
        $food->save();

        return redirect('/etteremlap/'.$food->point_id);
    }

    public function show($id){
      $post= Point::all();
      $post2= Point::find($id);
        
       
        return view("pages.etelform")->with(array("points" => $post, "points2"=>$post2));

    

    }
    function load_food(Request $request)
    {
     if($request->ajax())
     {
      if($request->point_id > 0)
      {
       $data = DB::table('foods')
          ->where('point_id', '<', $request->point_id)
          ->orderBy('id', 'DESC')
          ->limit(5)
          ->get();
      }
      else
      {
       $data = DB::table('foods')
          ->orderBy('point_id', 'DESC')
          ->limit(5)
          ->get();
      }
      $output = '';
      $last_id = '';
      
      if(!$data->isEmpty())
      {
          
       foreach($data as $row)
       {
        $output .= '
        <div class="row">
         <div class="well">
          <h3 class="text-info"><b>'.$row->name.'</b></h3>
          <p>'.$row->type.'</p>
          <br />
          
         </div>         
        </div>
        ';
        $last_id = $row->point_id;
       }
       $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Load More</button>
       </div>
       ';
      }
      else
      {
       $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
       </div>
       ';
      }
      echo $output;
     }
    }
}