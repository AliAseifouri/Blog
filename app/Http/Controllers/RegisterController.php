<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');


    }

    public function store()
    {
        $attributes = request()->validate([
            'name'=>'required|max:225',
            'username'=>'required|max:225|min:3|unique:users,username',
            'email'=>'required|email|max:225|unique:users,email',
            'password'=>'required|min:7|max:225'

        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success','Your account has been created.');


    }
}


 // session()->flash('success','Your account has been created.');