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
        //Получаем данные и валидируем их
        $data = $request->validate([
            'login'=>'required',
            'password'=>'required'
        ]);

        //Попытка авторизации 
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            //Если аккаунт найден 
            return redirect()->route("admin");
        }
        
        //Если аккаунт не найден вернуть пользователя назад с ошибкой  
        return back()->withErrors([
            'login' => 'Аккаунт не найден',
        ])->onlyInput('login');
    }
}
