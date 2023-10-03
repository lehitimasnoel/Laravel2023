<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }
    public function register(): View
    {
        return view('auth.register');
    }
    public function postLogin(Request $request): RedirectResponse
    {

        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => 'required',
        ]);

       $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('message','You have Successfully loggedin');
        }
        return redirect('login')->with('message','Oppes! You have entered invalid credentials');
    }
    public function postRegistration(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        //$check = $this->create($data);
        User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->intended('dashboard')->with('message','Great! You have Successfully loggedin');
    }
    public function dashboard(): View
    {
        if(Auth::check()){
            return view('pages.dashboard');
        }

        return redirect("login")->with('message','Opps! You do not have access');
    }
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
