<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Porfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index(){

        $skill = Skill::all();

        return view('admin.skills.all', ['skills' => $skill]);
    }

    public function create(){
        return view('admin.skills.all');
    }


    public function store(Request $request){

        $request->validate([
            'lang_name' => ['required','string'],
            'lang_image' => ['required','image'],
        ]);

        $skill = new Skill;

        $skill->lang_name = $request->lang_name;
        $skill->lang_image = $this->upload_image($request);
        
        $skill->porfolio()->attach();
        $skill->save();

        return response()->json('ok', 201);
    }


    protected function upload_image($request){
        $extension =$request->lang_image->extension();
        $disk = 'public';
        $dir = 'skill_files';
        $file_name = Str::random(20).".$extension";
        $path = $request->lang_image->storeAs( $dir, $file_name ,  $disk);

        return $path;
    }


    public function edit(){
        return view ('admin.skills.update');
    }

    public function delete(Request $request, $slug){
        $skill = Skill::where('slug', $slug)->firstorfail();
        $disk = 'public';
        Storage::disk($disk)->delete($skill->lang_image);
        
        $skill->delete();

        $notification = [
            'type' => 'success',
            'title' => 'Done',
            'text' => 'Skill Deleted Successfully.'
        ];

        $request->session()->flash('notification', json_encode($notification)); 
        
        return response()->json([], 204);
    }
}
