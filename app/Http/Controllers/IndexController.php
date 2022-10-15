<?php

namespace App\Http\Controllers;

use App\Models\Porfolio;
use App\Models\Training;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index (){
        $porfolios = Porfolio::latest()->whereNotNull('published_at')->get();

        $trainings = Training::latest()->whereNotNull('published_at')->get();
        
        return view('index', compact('porfolios', 'trainings'));
   }
}
