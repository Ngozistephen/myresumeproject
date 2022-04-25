<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Porfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePorfolioRequest;


class PorfolioController extends Controller
{
    public function index(){    
            return view ('admin.porfolios.all');
    }


    public function create(){
        $skills = Skill::all();
        return view ('admin.porfolios.create', compact('skills'));
    }


    public function edit(){
        return view ('admin.porfolios.edit');
    }

    public function store(StorePorfolioRequest $request){

        $porfolio = new Porfolio;

        $porfolio->job_title = $request->job_title;
        $porfolio->project_name = $request->project_name;
        $porfolio->user_id = Auth::user()->id;
        $porfolio->content = $request->content;
        $porfolio->end_date = $request->end_date;
        $porfolio->start_date = $request->start_date;
        $porfolio->featured_img = $this->upload_image($request);
        $porfolio->published_at = $request->filled('published') ? Carbon::now() : null;
        
        $porfolio->save();

        return response()->json('ok', 201);

        
    }

    protected function upload_image($request){
        $extension =$request->feature_img->extension();
        $disk = 'public';
        $dir = 'porfolio_files';
        $file_name = Str::random(20).".$extension";
        $path = $request->feature_img->storeAs( $dir, $file_name ,  $disk);

        return $path;
    }
}
