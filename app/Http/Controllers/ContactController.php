<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

        $users = User::with("contact")->get();
        return view('admin.contacts.all', compact('users'));
    }

    public function store(Request $request, User $user) {
        $request->validate([

            'address' => ['required','min:3','string'],
            'phone_number' => ['required','min:3','integer'],
            'social_medialinks' => ['required','array'],
            'profile_img' => ['required','image'],
            'about' => ['required','min:10','string'],
        ]);

        $user->about = $request->about;
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

    
}
