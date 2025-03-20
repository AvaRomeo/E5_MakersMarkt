<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->get();
        return view('profile.index', ['user' => Auth::user()], compact('products'));
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
        // Validate the input: either email or name is required, and password is required.
        $data = $request->validate([
            'email_or_name' => 'required', // We will check for both name and email
            'password' => 'required',
        ]);
    
        // Check if the input is an email or name
        $user = User::where(function($query) use ($data) {
            $query->where('email', $data['email_or_name'])
                  ->orWhere('name', $data['email_or_name']);
        })->first();
    
        if ($user && Auth::attempt(['email' => $user->email, 'password' => $data['password']])) {
            // Authentication passed...
            return redirect()->intended('/');
        }
    
        return back()->withErrors(['email_or_name' => 'Invalid credentials'])->onlyInput('email_or_name');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
