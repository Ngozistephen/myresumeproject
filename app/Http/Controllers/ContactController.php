<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

        $users = User::all();
        return view('admin.contacts.all', compact('users'));
    }

    public function store(Request $request) {
        $request->validate([

            'address' => ['required','min:3','string'],
            'phone_number' => ['required','min:3','integer'],
            'social_medialinks' => ['required','json'],
        ]);
    }

    
}
