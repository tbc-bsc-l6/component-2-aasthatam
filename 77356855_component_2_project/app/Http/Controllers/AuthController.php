<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function loginView() : View
    {
        return view('login', [
            "title" => "Login"
        ]);
    }

    public function login(LoginRequest $request) : JsonResponse|RedirectResponse
    {
        
        if (Auth::attempt($request->getData())){
            $request->session()->regenerate();
            return response()->json();
        }
        return back()->withErrors([
            "email"=>"The provided email does not match with our data."
        ])->onlyInput("email");
    }

    public function logout(Request $request) : JsonResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        Session::flush();
        return response()->json();
    }
}

