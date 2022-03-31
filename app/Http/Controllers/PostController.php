<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(){    
            return view ('admin.posts.all');
    }


    public function create(){
            return view ('admin.posts.create');
    }


    public function edit(){
        return view ('admin.posts.edit');
    }
}
