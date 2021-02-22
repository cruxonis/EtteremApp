<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\Factory;
use Illuminate\Http\Request;
use App\Point;
use DB;

class PointsController extends Controller
{
    public function form(){
        return view('pages.etteremform');
        }

    public function store(Request $request){
        $this->validate($request, [
            'title'=> 'required|min:3|unique:points,name'
        ]);

        //Create Post
        $point=new Point;
        $point->name=$request->input('title');
        $point->type=$request->input('type');
        $point->save();

        return redirect('/');
    }
    
    
    public function load(){
        return view('pages.index'); 
    }

    function load_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->id > 0)
      {
       $data = DB::table('points')
          ->where('id', '<', $request->id)
          ->orderBy('id', 'DESC')
          ->limit(5)
          ->get();
      }
      else
      {
       $data = DB::table('points')
          ->orderBy('id', 'DESC')
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
          <a href=""><h3 class="text-info"><b>'.$row->name.'</b></h3></a>
          <p>'.$row->type.'</p>
          <br />
          
         </div>         
        </div>
        ';
        $last_id = $row->id;
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
