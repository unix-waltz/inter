<?php

namespace App\Http\Controllers;

use App\Models\User as UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function Register(){
return view('auth.register');
    }
    public function _Register(Request $r){
        $v = $r->validate([
            "email" => "email|required|unique:users",
            "name" => "string|min:6|max:25|required",
            "role" => "required",
            "password" => "min:6|required",
        ]);
    $v['password'] = bcrypt($r->password);
    UserModel::create($v);
    return redirect('/auth/login');
    }
    public function Login(){
        return view('auth.login');
            }
    public function _Login(Request $r){
                

        $credentials = $r->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $r->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function _logout(Request $r){
        Auth::logout();
 
        $r->session()->invalidate();
     
        $r->session()->regenerateToken();
     
        return redirect('/');
            }
        }
