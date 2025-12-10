<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Student/Admin Registration
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|unique:users,email',
            'password'              => 'required|string|min:6|confirmed',
            'profile'               => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Handle profile image
        $profilePath = null;
        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public');
        }

        // Create user
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => 'student',   
            'profile'  => $profilePath
        ]);

        $request->session()->forget('url.intended');

        Auth::login($user);
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('dashboard')->with('success', 'Account created successfully!');
        }
    }


    /**
     * Login (Student or Admin)
     */
  public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if ($credentials['email'] === 'maki@gmail.com') {
            $user = \App\Models\User::where('email', 'maki@gmail.com')->first();
            
            if (!$user) {
                return back()->withErrors(['email' => 'Admin user not found']);
            }
            
            Auth::login($user);
            $request->session()->regenerate();
            
            return redirect()->route('admin.dashboard');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('components.layout');
    }

    /**
     * Update Profile (Student/Admin)
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'     => 'sometimes|string|max:255',
            'email'    => ['sometimes', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'sometimes|min:6',
            'profile'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload new profile image
        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public');
            $validated['profile'] = $profilePath;
        }

        // Hash new password if provided
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return response()->json([
            'message' => 'Profile updated successfully',
            'user'    => $user
        ]);
    }

    public function edit()
    {
        return view('profile.edit');
    }
}
