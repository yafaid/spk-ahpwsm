<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  

    public function actionlogin(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('You have successfully logged in');
        }

        return redirect()->route('viewlogin')->withError('Username atau Password salah bang');
    }

    // public function dashboard()
    // {
    //     if (Auth::check()) {
    //         // return view('dashboard.masteradmin');
    //     }

    //     return redirect()->route('viewlogin')->withError('Oops! You do not have access');
    // }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('viewlogin');
    }
}
