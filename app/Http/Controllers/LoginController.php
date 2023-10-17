<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function dashboard()
    {
        if(Auth::check() === true)
        {
            return view('pages.dashboard.dashboard');
        }

        return redirect()->route('login.index');
    }
    
    public function index()
    {
        return view('pages.auth.login');
    }


    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $authenticated = Auth::attempt($credentials);

        if(!$authenticated)
        {
            return redirect()->route('login.index')->withErrors(['error' => 'E-mail ou senha inválido']);
        }

        return redirect()->route('dashboard.index');       
    }

    public function destroy()
    {
        Auth::logout();        
        return redirect()->route('login.index');
    }
    
}
