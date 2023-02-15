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
            'usernme'=>['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>['required', 'min:7', 'max:255'],
        ]);

        User::create($attributes);


        return redirect('/');
        //If validation fails, we are redirected back to previous form.
    }
}
