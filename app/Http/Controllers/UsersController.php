<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        return view('profile.index', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validatie
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Gegevens bijwerken
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profiel succesvol bijgewerkt!');
    }

    public function destroy()
    {
        $user = Auth::user();
        if ($user) {
            $user->delete();

            return redirect('/')->with('success', 'Je account is succesvol verwijderd.');
        }

        return redirect()->route('profile.index')->with('error', 'Er is iets mis gegaan bij het verwijderen van je account.');
    }

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
