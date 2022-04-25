<?php

namespace App\Http\Controllers;

use App\Models\Porfolio;
use App\Models\Skill;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(){
        return view('admin.skills.all');
    }

    public function create(){
        return view ('admin.skills.all');
    }


    public function store(Request $request){

        $request->validate([
            'lang_name' => ['required','string'],
            'lang_image' => ['required','image'],
        ]);

        $skill = new Skill;

        $skill->lang_name = $request->lang_name;
        // is this thing correct
        $skill->porfolio_id = request('porfolio_id'); 
        $skill->lang_image = $this->upload_image($request);

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
}
