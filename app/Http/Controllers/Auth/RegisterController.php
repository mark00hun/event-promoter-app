<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Processes\RegisterProcess;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display register page
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     */
    public function register(RegisterRequest $request, RegisterProcess $process)
    {
        $user = $process->createUser($request->validated());

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
