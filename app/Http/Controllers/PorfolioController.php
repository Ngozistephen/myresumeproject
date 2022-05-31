<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Porfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePorfolioRequest;
use App\Http\Requests\UpdatePorfolioRequest;

class PorfolioController extends Controller
{
    public function index(){ 
             $porfolios = Porfolio::latest()->get();   
            return view ('admin.porfolios.all' , compact('porfolios'));
            // i can use compact or this method ['porfolio' => $porfolio]
    }


    public function create(){
        $skills = Skill::all();
        return view ('admin.porfolios.create', compact('skills'));
    }

    public function preview($slug){
        $porfolio = Porfolio::where('slug' , $slug)->firstorfail();
        $skills = Skill::all();
        return view ('admin.porfolios.preview', compact('porfolio', 'skills'));
    }

    public function edit($slug){
        $porfolio = Porfolio::where('slug' , $slug)->firstorfail();
        $skills = Skill::all();
        return view ('admin.porfolios.edit', compact('porfolio', 'skills'));
    }

    public function store(StorePorfolioRequest $request){

        $porfolio = new Porfolio;

        $porfolio->job_title = $request->job_title;
        $porfolio->project_name = $request->project_name;
        $porfolio->user_id = Auth::user()->id;
        $porfolio->content = $request->content;
        // rap it around carbon before passing it
        $porfolio->start_date = new Carbon($request->startDate);
        $porfolio->end_date = new Carbon($request->endDate);
        $porfolio->featured_img = $this->upload_image($request);
        $porfolio->published_at = $request->filled('published') ? Carbon::now() : null;
        
        $porfolio->save();

        $notification = [
            'type' => 'success',
            'title' => 'Done',
            'text' => 'Porfolio Saved Successfully.'
        ];

        $request->session()->flash('notification', json_encode($notification)); 

        return response()->json('ok', 201);
        
    }

   
     
    public function update(UpdatePorfolioRequest $request, $slug){
        $porfolio = Porfolio::where('slug', $slug)->firstorfail();

        $porfolio->job_title = $request->job_title;
        $porfolio->project_name = $request->project_name;
        $porfolio->content = $request->content;
        // rap it around carbon before passing it
        $porfolio->start_date = new Carbon($request->startDate);
        $porfolio->end_date = new Carbon($request->endDate);
       
        $porfolio->published_at = $request->filled('published') ? Carbon::now() : null;

        
        if ($request->hasfile('feature_img') && $request->File('feature_img')->isValid()) {
            $disk= 'public';
            $path = $this->upload_image($request);
            Storage::disk($disk)->delete($porfolio->featured_img);

            $porfolio->featured_img =  $path;
        }

        $porfolio->save();

        $notification = [
            'type' => 'success',
            'title' => 'Done',
            'text' => 'Porfolio Updated Successfully.'
        ];

        $request->session()->flash('notification', json_encode($notification)); 

        return response()->json('ok', 201);
    }

    public function delete(Request $request, $slug){
        $porfolio = Porfolio::where('slug', $slug)->firstorfail();
        $disk = 'public';
        Storage::disk($disk)->delete($porfolio->featured_img);

        $porfolio->delete();

        $notification = [
            'type' => 'success',
            'title' => 'Done',
            'text' => 'Porfolio Deleted Successfully.'
        ];

        $request->session()->flash('notification', json_encode($notification)); 
        
        return response()->json([], 204);
    }


    protected function upload_image($request){

        if($request->hasFile('feature_img') && $request->file('feature_img')->isValid()){
              # code...
            $extension =$request->feature_img->extension();
            $disk = 'public';
            $dir = 'porfolio_files';
            $file_name = Str::random(20).".$extension";
            $path = $request->feature_img->storeAs( $dir, $file_name ,  $disk);
    
            return $path;
        }
        return null;

    }
}
