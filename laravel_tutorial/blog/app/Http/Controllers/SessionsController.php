<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    public function create(){
        return view('sessions.create');
    }

    //There are also started kits that gives all these functionalities, dont need to to do this by hand like below
    public function store(){
        //validate the request
        $credentials = request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        //attempt to log in with credentials and if correct signs in
        if(auth()->attempt($credentials)) {
            //session fixation handling
            session()->regenerate(); //regenerate user's session
            return redirect('/')->with('success', 'Welcome Back !');
        } 

        //auth failed
        throw ValidationException::withMessages([ //behind the scenes the Laravel handler handles this exception
            'email' => 'Your provided credentials could not be verified.' 
        ]);
        //return back()->withInput()->withErrors(['email', "Your provided credentials could not be verified."]);
    }
}
