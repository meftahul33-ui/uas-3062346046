<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/admin');
    } else {
        return redirect('/admin/login');
    }
});

// Simple authentication routes (minimal for local testing)
Route::middleware('guest')->group(function () {
    Route::get('login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('login', function (Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    })->name('login.attempt');
});

// Debug route for local testing — remove before committing
if (app()->environment('local')) {
    Route::get('_debug/login-check', function () {
        $u = \App\Models\User::where('email', 'test@example.com')->first();

        return [
            'exists' => (bool) $u,
            'hash_check' => $u ? \Illuminate\Support\Facades\Hash::check('password', $u->password) : false,
        ];
    });
}

Route::post('logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout')->middleware('auth');
