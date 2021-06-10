<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = config('anjir.administrator.username');
        $password = config('anjir.administrator.password');

        if ($request->username == $username && $request->password == $password) {
            session(['username' => $username]);
            return redirect('/panel');
        }

        return back()->withErrors(['error' => 'نام کاربری یا کلمه عبور اشتباه است!']);
    }
}
