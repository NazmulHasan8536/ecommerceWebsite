<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('post.index');
    }

    public function create(){
        return view('post.create');
    }
}
