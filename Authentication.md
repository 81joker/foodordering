# Authentication Documentation

This document describes the authentication flow and implementation steps used in the Food Ordering project.

---

## Overview

- **Login** and **Register** use modal popups on the website layout (no separate full-page views).
- Visiting `/login` or `/register` redirects to the home page with a query parameter so the correct modal opens.
- **Social login** (Google, Facebook, GitHub) is implemented with Laravel Socialite; users can sign in or be created on first use.

---

## 1. Routes (`routes/web.php`)

| Method | URI | Name | Controller method |
|--------|-----|------|--------------------|
| GET | `/login` | `login` | `showLogin` |
| POST | `/login` | `login.post` | `login` |
| GET | `/register` | `register` | `showRegister` |
| POST | `/register` | `register.post` | `register` |
| POST | `/logout` | `logout` | `logout` |
| GET | `/auth/google` | `auth.google` | `google` |
| GET | `/auth/google/callback` | `auth.google.callback` | `googleRedirect` |
| GET | `/sign-in/google/redirect` | `auth.google.callback.alt` | `googleRedirect` |
| GET | `/auth/facebook` | `auth.facebook` | `redirectToFacebook` |
| GET | `/auth/facebook/callback` | `auth.facebook.callback` | `handleFacebookCallback` |
| GET | `/auth/github` | `auth.github` | `redirectToGitHub` |
| GET | `/auth/github/callback` | `auth.github.callback` | `handleGitHubCallback` |
| GET | `/sign-in/github/redirect` | `auth.github.callback.alt` | `handleGitHubCallback` |

---

## 2. Login

### Behaviour

- **`showLogin()`**: If the user is already logged in, redirects by role (admin → dashboard, customer → home). Otherwise redirects to `route('home', ['login' => 1])` so the login modal opens on the home page.
- **`login(Request $request)`**: Validates `email` and `password`, attempts `Auth::attempt()`. On success, regenerates session and redirects admin to `admin.dashboard` or others to `home`. On failure, redirects back with validation errors.

### Layout (modal)

- **File:** `resources/views/website/layouts/app.blade.php`
- **Trigger:** Topbar links with class `log-popup-btn` open the SIGN IN modal (handled by template jQuery in `main.js`: adds class `log-popup-active` to `<html>`).
- **Form:** POST to `route('login.post')`, fields `email`, `password`, `@csrf`. Validation errors and `session('error')` are displayed in the modal.
- **Auto-open:** If the URL has `?login=1` or there are `email`/`password` validation errors, the layout adds `class="log-popup-active"` to `<html>` so the login modal is shown on load.

---

## 3. Register

### Form Request

- **File:** `app/Http/Requests/RegisterRequest.php`
- **Rules:** `name` (required, string, max 255), `email` (required, email, max 255, unique:users), `password` (required, string, min 8, confirmed).
- **Authorization:** `authorize()` returns `true` (guests may register).

### Controller

- **`showRegister()`**: If the user is already logged in, redirects to home. Otherwise redirects to `route('home', ['register' => 1])` so the register modal opens.
- **`register(RegisterRequest $request)`**: Uses `$request->validated()`, creates a user with `User::create()` (name, email, hashed password, `role` = `customer`), then `Auth::login()` and session regenerate, redirect to `home`.

### Layout (modal)

- **Trigger:** Topbar links with class `sign-popup-btn` open the SIGN UP modal (`sign-popup-active` on `<html>`).
- **Form:** POST to `route('register.post')`, fields `name`, `email`, `password`, `password_confirmation`, `@csrf`. Validation errors displayed in the modal.
- **Auto-open:** If the URL has `?register=1` or there is a `name` validation error, the layout adds `class="sign-popup-active"` to `<html>`.

---

## 4. Logout

- **Route:** POST to `route('logout')`.
- **Controller:** `logout()` calls `Auth::logout()`, invalidates session, regenerates token, then redirects to `route('home', ['login' => 1])`.
- **Layout:** A hidden form with `id="logout-form"` and `action="{{ route('logout') }}"` is submitted via the LOGOUT link in the topbar when the user is logged in.

---

## 5. Social Login (Google, Facebook, GitHub)

### Package and config

- **Package:** `laravel/socialite` (composer).
- **Config:** `config/services.php` defines:
  - `google`: `client_id`, `client_secret`, `redirect` (from env).
  - `facebook`: same keys.
  - `github`: same keys.

### Environment variables (`.env`)

```env
# Google
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=   # e.g. https://yourdomain.com/auth/google/callback or /sign-in/google/redirect

# Facebook
FACEBOOK_CLIENT_ID=
FACEBOOK_CLIENT_SECRET=
FACEBOOK_REDIRECT_URI= # e.g. https://yourdomain.com/auth/facebook/callback

# GitHub
GITHUB_CLIENT_ID=
GITHUB_CLIENT_SECRET=
GITHUB_REDIRECT_URI=   # e.g. https://yourdomain.com/auth/github/callback or /sign-in/github/redirect
```

### Controller flow

- **Redirect methods:** `google()`, `redirectToFacebook()`, `redirectToGitHub()` return `Socialite::driver(...)->redirect()` to send the user to the provider.
- **Callback methods:** `googleRedirect()`, `handleFacebookCallback()`, `handleGitHubCallback()`:
  1. Call `Socialite::driver(...)->user()` to get the provider user.
  2. Call `findOrCreateSocialUser($email, $name)` to get or create a `User` with `role` = `customer` (random password for new users).
  3. `Auth::login($user, true)` and redirect to `route('home')`.
- **`findOrCreateSocialUser()`:** Throws if `email` is empty. Otherwise uses `User::firstOrCreate(['email' => $email], ['name' => $name, 'password' => Hash::make(Str::random(16)), 'role' => 'customer'])`.
- All callbacks are wrapped in `try/catch`; on any exception the user is redirected to `route('home', ['login' => 1])` with a flash message (e.g. "Sign in with Google failed. Please try again.").

### Layout (buttons)

- In both SIGN IN and SIGN UP modals, social buttons link to:
  - `route('auth.facebook')`
  - `route('auth.google')`
  - `route('auth.github')`
- Session flash `session('error')` is shown in the login modal when social sign-in fails.

---

## 6. Layout behaviour summary

- **Topbar:** If `Auth::check()`, show user name and LOGOUT; else show LOGIN and REGISTER (popup triggers).
- **Popups:** Two modals, `.log-popup` (SIGN IN) and `.sign-popup` (SIGN UP). Visibility is controlled by classes `log-popup-active` and `sign-popup-active` on `<html>` (see `public/frontend/assets/js/main.js` and `public/frontend/assets/css/main.css`).
- **Cross-links:** "Not a member? Sign up" → `?register=1`; "Already Registered? Sign in" → `?login=1`.

---

## 7. Production notes

- **Redirect URIs:** In each provider’s console (Google, Facebook, GitHub), set the redirect/callback URL to match your app (e.g. `https://yourdomain.com/auth/google/callback` or `/sign-in/google/redirect`). Use HTTPS in production.
- **Session:** Ensure `APP_URL` and session settings (e.g. `SESSION_SECURE_COOKIE`, `SESSION_DOMAIN`) are correct so cookies work after redirects from the provider.
- **Local vs online:** Social login often fails on localhost because redirect URIs and session/cookie behaviour differ; it is intended to work when deployed online with the correct env and provider settings.

---

## 8. Files touched

| File | Purpose |
|------|---------|
| `app/Http/Controllers/AuthController.php` | Login, register, logout, social redirect/callback and `findOrCreateSocialUser` |
| `app/Http/Requests/RegisterRequest.php` | Validation for registration |
| `config/services.php` | Google, Facebook, GitHub client and redirect config |
| `routes/web.php` | Auth and social routes |
| `resources/views/website/layouts/app.blade.php` | Topbar auth links, login/register modals, social buttons, auto-open via query params and errors |
