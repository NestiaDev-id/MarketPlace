<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        return  view('/login');
    }
    public function register()
    {
        return  view('/register');
    }
    public function loginProcess(Request $req)
    {
        $credentials = $req->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Username or Password invalid');
        return redirect('/login');
    }
    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:32',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'max:10',
            'address' => 'required|max:255'
        ]);
        $request['password'] = Hash::make($request->password);

        $user = User::create($request->all());

        Session::flash('status', 'succes');
        Session::flash('message', 'Register success, you can login now');
        return redirect('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
