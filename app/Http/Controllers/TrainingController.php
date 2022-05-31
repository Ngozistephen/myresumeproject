<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TrainingController extends Controller
{
    public function index(){

        $trainings = Training::latest()->get(); 
        return view('admin.trainings.all', compact('trainings'));
    }


    public function create(){
        return view ('admin.trainings.create');
    }

    public function preview($slug){
        $training = Training::where('slug' , $slug)->firstorfail();
        return view ('admin.trainings.all', compact('training'));
    }

    public function store(Request $request){

        $request-> validate([
            'company_name' => ['required','min:3','string'],
            'certification_acquired' => ['required','min:3','string'],
            'content' => ['required','min:10','string'],
            'startDate' => ['required','date'],
            'endDate' => ['required','date'],
        ]);

        $training = new Training;

        $training->company_name = $request->company_name;
        $training->certification_acquired = $request->certification_acquired;
        $training->content = $request->content;
        // rap it around carbon before passing it
        $training->start_date = new Carbon($request->startDate);
        $training->end_date = new Carbon($request->endDate);
        $training->published_at = $request->filled('published') ? Carbon::now() : null;

        $training->save();

        $notification = [
            'type' => 'success',
            'title' => 'Done',
            'text' => 'Training Saved Successfully.'
        ];

        $request->session()->flash('notification', json_encode($notification)); 

        return response()->json('ok', 201);

    }
    public function update(Request $request, $slug){

        $request-> validate([
            'company_name' => ['required','min:3','string'],
            'certification_acquired' => ['required','min:3','string'],
            'content' => ['required','min:10','string'],
            'startDate' => ['required','date'],
            'endDate' => ['required','date'],
        ]);

        $training = Training::where('slug', $slug)->firstorfail();

        $training->company_name = $request->company_name;
        $training->certification_acquired = $request->certification_acquired;
        $training->content = $request->content;
        // rap it around carbon before passing it
        $training->start_date = new Carbon($request->startDate);
        $training->end_date = new Carbon($request->endDate);
        $training->published_at = $request->filled('published') ? Carbon::now() : null;

        $training->save();

        $notification = [
            'type' => 'success',
            'title' => 'Done',
            'text' => 'Training Updated Successfully.'
        ];

        $request->session()->flash('notification', json_encode($notification)); 

        return response()->json('ok', 201);

    }


    public function edit($slug){

        $training = Training::where('slug' , $slug)->firstorfail();
        return view ('admin.trainings.edit', compact('training'));
    }

    public function delete(Request $request, $slug){
        $training = Training::where('slug', $slug)->firstorfail();
        
        $training->delete();

        $notification = [
            'type' => 'success',
            'title' => 'Done',
            'text' => 'Training Deleted Successfully.'
        ];

        $request->session()->flash('notification', json_encode($notification)); 
        
        return response()->json([], 204);
    }
    

}
