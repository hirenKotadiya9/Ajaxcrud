<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {

        return view('myweb.pages.home');
    }

    public function about() {
        return view('myweb.pages.about');
    }

    public function showLoginForm() {
        return view('myweb.pages.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Login successful!');
        }

        return back()->withErrors(['error' => 'Invalid credentials']);
    }

    public function logout() {
        auth()->logout();

        session()->forget(['last_login', 'user_role']);

        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }

    public function showRegisterForm() {
        return view('myweb.pages.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        session()->flash('success', 'Registration successful. You are now logged in.');

        return redirect()->route('home');
    }

    public function fetchUsers() {
        $users = User::all();
        return view('myweb.pages.display', compact('users'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('myweb.pages.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:4|confirmed',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('users')->with('success', 'User updated successfully');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users')->with('success', 'User deleted successfully');
    }
}
