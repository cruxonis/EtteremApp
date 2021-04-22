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

    public function showForm($id){
      $post= Point::all();
      $post2= Point::find($id);
        
       
        return view("pages.etelform")->with(array("points" => $post, "points2"=>$post2));

    

    }
    function load_foods( Request $request)
    {

       
       
     if($request->ajax())
     {
      
      if($request->id > 0)
      {
       $data = DB::table('foods')
          ->where('id', '<', $request->id )
          ->where('point_id', '=',$request->urlId)
          ->where('not_stored', '<',5 )
          ->orderBy('id', 'DESC')
          ->limit(5)
          ->get();
      }
      else
      {
       $data = DB::table('foods')
          ->where('point_id', '=',$request->urlId)
          ->where('not_stored', '<',5)        
          ->orderBy('id', 'DESC')
          ->limit(5)
          ->get();
      }
    
    }
      $output = '';
      $last_id = '';
      
      if(!$data->isEmpty())
      {
          
       foreach($data as $row)
       {
           $ings=json_decode($row->ingredients);
           $categs=json_decode($row->categories);

            $output .= '
           
        
            <div class="row">
            <div class="well" >
            <div style= "display: flex">
            <h3 class="text-info"style="width: 25%"><b>'.$row->name.'</b></h3>
         
            <h3 style= "width: 25%"><b>'.$row->price.' Ft</b></h3>
            <span onclick="toggleDetail('.$row->id.')" style="cursor: pointer;"><i id='.$this->createEyeId($row->id).' style="font-size:24px" class="fa">&#xf06e;</i></span>
            </div>
          
            <div style= "display:  none "  class="secret" id="'. $row->id .'">
            <p style="width: 50%">'. $row->description.'</p>
            <div style= "width: 25%"> '.$this->createIngredientsHtmlString($ings) .'</div>
            <div style= "width: 25%">'.$this->createCategoriessHtmlString($categs).'</div>
            <div style= "width: 25%"><button onclick="notInStore('.$row->id.')" id="'.$this->createButtonId($row->id).'">Már nem kapható</button></div> 
            </div>
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
                    <button type="button" name="load_more_button" class="btn btn-info form-control" >No Data Found</button>
                </div>
                ';
                }
                echo $output;
      
                        }
    
    
    
    
    public function createIngredientsHtmlString($ings){
        $ingredis='<ul>';
        
        foreach($ings as $ing){
           $ingredis= $ingredis .
           '<li>'.$ing.'</li>' ;
        }
        $ingredis= $ingredis .'</ul>';  
        return $ingredis;
    }

    public function createCategoriessHtmlString($categs){
        $categes='<ul>';
        
        foreach($categs as $categ){
           $categes= $categes .
           '<li>'.$categ.'</li>' ;
        }
        $categes= $categes .'</ul>';  
        return $categes;
    }
public function createButtonId($id){
    $buttonId="buttonId" ;

    $buttonId=$buttonId.$id;
        
    
    return $buttonId;
}
public function createEyeId($id){
    $eyeId="eye" ;

    $eyeId=$eyeId.$id;
        
    
    return $eyeId;
}

public function not_stored(Request $request){
    if($request->ajax()){
        $notStored = Food::find($request->id);
        
        $notStored->not_stored=$notStored->not_stored+1;    
        
        $notStored->save();    
            
        }
    }
}


