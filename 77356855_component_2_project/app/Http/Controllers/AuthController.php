<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function loginView() : View|RedirectResponse
    {
        if(Auth::check()){
            return redirect("/dashboard");
        }
        return view('login', [
            "title" => "Login"
        ]);
    }

    public function login(LoginRequest $request) : JsonResponse|RedirectResponse
    {
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['redirect' => route('dashboard')]);
        }

        return response()->json(['message' => 'Invalid credentials'], 422);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush();
        return redirect('/');
    }

     // New method to show the registration form
     public function registerView(): View|RedirectResponse
     {
         if (Auth::check()) {
             return redirect("/dashboard");
         }
         return view('register', [
             "title" => "Register"
         ]);
     }
 
     // New method to handle the registration process
     public function register(Request $request): RedirectResponse
    {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    Auth::login($user);

    return redirect()->route('dashboard');
   }
}

