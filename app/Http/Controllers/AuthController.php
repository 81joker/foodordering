<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'customer') {
                return redirect()->route('home');
            } else {
                Auth::logout();
            }

            return redirect('/');
        }

        return redirect()->route('home', ['login' => 1]);
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return redirect()->route('home', ['register' => 1]);
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'customer',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home', ['login' => 1]);
    }

    public function google()
    {
        // send the user to request to Google
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        try {
            $socialUser = Socialite::driver('google')->user();
            $user = $this->findOrCreateSocialUser($socialUser->getEmail(), $socialUser->getName());
            Auth::login($user, true);

            return redirect()->route('home');
        } catch (\Throwable $e) {
            return redirect()->route('home', ['login' => 1])->with('error', 'Sign in with Google failed. Please try again.');
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $socialUser = Socialite::driver('facebook')->user();
            $user = $this->findOrCreateSocialUser($socialUser->getEmail(), $socialUser->getName());
            Auth::login($user, true);

            return redirect()->route('home');
        } catch (\Throwable $e) {
            return redirect()->route('home', ['login' => 1])->with('error', 'Sign in with Facebook failed. Please try again.');
        }
    }

    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubCallback()
    {
        try {
            $socialUser = Socialite::driver('github')->user();
            $user = $this->findOrCreateSocialUser($socialUser->getEmail(), $socialUser->getNickname() ?: $socialUser->getName());
            Auth::login($user, true);

            return redirect()->route('home');
        } catch (\Throwable $e) {
            return redirect()->route('home', ['login' => 1])->with('error', 'Sign in with GitHub failed. Please try again.');
        }
    }

    private function findOrCreateSocialUser(?string $email, ?string $name): User
    {
        if (empty($email)) {
            throw new \RuntimeException('Your account has no email.');
        }
        $name = $name ?: (explode('@', $email)[0] ?? 'User');

        return User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make(Str::random(16)),
                'role' => 'customer',
            ]
        );
    }
}
