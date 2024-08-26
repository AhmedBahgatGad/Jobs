<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Admin;
use App\Models\Candidate;
use App\Models\Employer;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string'],
            'Fname' => ['nullable', 'string', 'max:255'], 
            'Lname' => ['nullable', 'string', 'max:255'], 
            'DOB' => ['nullable', 'date'],
            'phone' => ['nullable', 'string'], 
            'resume' => ['nullable', 'string'], 
            'country' => ['nullable', 'string'], 
            'company_name' => ['nullable', 'string', 'max:255'], 
            'logo' => ['nullable', 'string'], 
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        
        if ($user->role === 'admin') {
            Admin::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'role' => $user->role,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } elseif ($user->role === 'candidate') {
            Candidate::create([
                
                'name' => $request->name,
                'email' => $user->email,
                'DOB' => $request->DOB,
                'password' => $user->password,
                'phone' => $request->phone,
                'resume' => $request->resume,
                'country' => $request->country,
                'role' => $user->role,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } elseif ($user->role === 'employer') {
            Employer::create([
                'company_name' => $request->company_name,
                'email' => $user->email,
                'password' => $user->password,
                'role' => $user->role,
                'logo' => $request->logo,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
