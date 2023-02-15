<?php

namespace App\Http\Controllers;


use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register/create');
    }

    public function store(){
        $attributes = request()->validate([
            'name'=>'required|max:255|min:3',
            //'username'=>'required|max:255|min:3|unique:users,username', //username has to be unique in the users table and username column
            'username'=>['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>['required', 'min:7', 'max:255'],
        ]);
        //if validatin fails, we auto redo redirected back to previous form

        $user = User::create($attributes);

        //log in the user
        auth()->login($user);
        
        //session()->flash('success', 'Your account has been created.'); 
        //redirect to homepage with the following flashed...
        return redirect('/')->with('success', 'Your account has been created.');;
    }
}
