<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index(){

        $users = User::with("contact")->get();
        return view('admin.contacts.all', compact('users'));
    }

    public function store(Request $request, User $user) {
        $request->validate([

            'address' => ['required','min:3','string'],
            'phone_number' => ['required','min:3','integer','numeric'],
            'social_medialinks' => ['required','array'],
            'profile_img' => ['required','image'],
            'about' => ['required','min:10','string'],
        ]);

        $user->about = $request->about;
        $user->profile_img = $this->upload_image($request);
        $user->save();

        $contact = $user->contact;

        if ($contact) {
            $contact->address = $request->address;
            $contact->phone_number = $request->phone_number;
            $contact->social_medialinks = $request->social_medialinks;

            $contact->save();
        }else{
            $user->contact()->create([
                'address' => $request->address,
                'phone_number'=> $request->phone_number,
                'social_medialinks'=> $request->social_medialinks,
            ]);
        }

        $notification = [
            'type' => 'success',
            'title' => 'Done',
            'text' => 'Your Contact Is Saved Successfully.'
        ];

        $request->session()->flash('notification', json_encode($notification)); 

        return response()->json('ok', 201);

    }
    public function update(Request $request, User $user,$slug) {
        $request->validate([

            'address' => ['required','min:3','string'],
            'phone_number' => ['required','min:3','integer','numeric'],
            'social_medialinks' => ['required','array'],
            'profile_img' => ['required','image'],
            'about' => ['required','min:10','string'],
        ]);

        $user = User::where('slug', $slug)->firstorfail();

        $user->about = $request->about;
        $user->profile_img = $this->upload_image($request);
        $user->save();

        $contact = $user->contact;

        if ($contact) {
            $contact->address = $request->address;
            $contact->phone_number = $request->phone_number;
            $contact->social_medialinks = $request->social_medialinks;

            $contact->save();
        }else{
            $user->contact()->update([
                // i changed the create to update
                'address' => $request->address,
                'phone_number'=> $request->phone_number,
                'social_medialinks'=> $request->social_medialinks,
            ]);
        }

        $notification = [
            'type' => 'success',
            'title' => 'Done',
            'text' => 'Your Contact Is Saved Successfully.'
        ];

        $request->session()->flash('notification', json_encode($notification)); 

        return response()->json('ok', 201);

    }

    protected function upload_image($request){

        if($request->hasFile('profile_img') && $request->file('profile_img')->isValid()){
              # code...
            $extension =$request->profile_img->extension();
            $disk = 'public';
            $dir = 'contact_files';
            $file_name = Str::random(20).".$extension";
            $path = $request->profile_img->storeAs( $dir, $file_name ,  $disk);
    
            return $path;
        }
        return null;

    }

    // public function edit($slug){
    //     $users = User::with('contact')->where('slug', $slug);
    //     return view ('admin.contacts.all', compact('users'));
    // }
    // for update
    public function edit(){   
        return view ('admin.contacts.all');
    }

    public function preview($slug){
        // $training = Training::where('slug' , $slug)->firstorfail();
        $users = User::with("contact")->where('slug', $slug)->firstOrFail();
        return view ('admin.contacts.all', compact('users'));
    }


    public function delete(Request $request, $slug){
        $user = User::where('slug', $slug)->firstorfail();
        $contact = $user->contact;
        $disk = 'public';
        Storage::disk($disk)->delete($user->profile_img);

        $contact->delete();

        $notification = [
            'type' => 'success',
            'title' => 'Done',
            'text' => 'Contact Deleted Successfully.'
        ];

        $request->session()->flash('notification', json_encode($notification)); 
        
        return response()->json([], 204);
    }

}
