<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /**
     * Log out account user
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
