<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MainController extends Controller
{
    public function index(){
        $post = DB::table('posts')
                ->join('categories','posts.category_id','categories.id')
                ->select('posts.*','categories.name','categories.slug')->latest()->paginate(6);
        return view('frontend.index',['post' => $post]);
    }
    
    public function about(){
        return view('frontend.about');
    }
    
    
    public function contact(){
        return view('frontend.contact');
    }


    
}
