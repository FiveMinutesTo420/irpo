<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __invoke(Request $request){
        return view('auto');
    }
    public function login(Request $request){
        $data = $request->validate([
            'login'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt($data)){
            $request->session()->regenerate();
 
            return to_route('admin');
        }
         
        return back()->withErrors([
            'login' => 'Аккаунт не найден',
        ])->onlyInput('login');
    }
}
