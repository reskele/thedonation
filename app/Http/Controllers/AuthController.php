<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle the registration of a new user.
     */
    public function register(Request $request)
    {
        // Validate the form data
        $validated = $request->validate( [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|in:donor,admin,recipient',
            'registration_number' => 'required_if:role,recipient|max:255',
            'password' => 'required|string|min:3|confirmed',

        ]);

        // Create a new user
        $user = User::create($validated);

        // Log in the user after registration
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle the login of a user.
     */
    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
        
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
                case 'donor':
                    return redirect()->route('donor.dashboard')->with('success', 'Welcome Donor!');
                case 'recipient':
                    return redirect()->route('recipient.dashboard')->with('success', 'Welcome Recipient!');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors(['email' => 'Unauthorized role.']);
            }
        }
        

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    /**
     * Handle the logout of the user.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'You have logged out successfully!');
    }

}