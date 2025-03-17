<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function create(){
        return view('login/register');
    }

    public function store(){
        // Validate the user
        $data = request()->validate([
            'name' => 'required|alpha',
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        // Create the user
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();

        return redirect('/login');
    }

    public function showLoginForm(){
        return view('login.login');
    }

    public function login(Request $request){
        // Validate the user
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the user exists
        $user = User::where('email', $data['email'])->first();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'invalid credentials'])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
