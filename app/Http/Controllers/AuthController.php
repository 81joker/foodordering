<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function showLogin()
    {
        // VERIFICATION : Si l'utilisateur est DÉJÀ connecté
        if (Auth::check()) {
            $user = Auth::user();
            
            // Si c'est un admin -> Direction Dashboard
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }else{
                Auth::logout();
            }
            
            // Si c'est un user normal -> Direction Accueil (ou autre page)
            return redirect('/');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
