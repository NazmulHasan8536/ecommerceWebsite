<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    
    public function about(){
        return view('frontend.about');
    }
    
    public function post(){
        return view('frontend.post');
    }
    
    public function contact(){
        return view('frontend.contact');
    }
}