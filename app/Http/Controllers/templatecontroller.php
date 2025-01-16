<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class templatecontroller extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('firstname', 'lastname', 'email', 'password');

        if (auth()->attempt($credentials)) {

            return redirect()->route('index')->with('success', 'Login successful!');
        }

        return back()->withErrors(['error' => 'Invalid credentials']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('index')->with('success', 'Logged out successfully!');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    public function fetchUsers()
    {
        $users = User::all();
        return view('display', compact('template'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('template'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:4|confirmed',
        ]);

        $user = template::findOrFail($id);

        $template->firstname = $request->firstname;
        $template->lastname = $request->firstname
        $template->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('template.fetch')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('template.fetch')->with('success', 'User deleted successfully');
    }
}

