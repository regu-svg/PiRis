<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function registration(Request $request){
        if(Auth::check()){
            return redirect(route('index'));
        }
        if(User::where('email', "=", $request['email'])->exists()){
            return redirect(route('create'))->withErrors([
                'email' => "Такая почта уже есть!"
            ]);
        }
        if($request['password'] != $request['password_confirmation']){
            return redirect(route('create'))->withErrors([
                'password' => "Пароли не совпадают!"
            ]);
        }

        $validate = $request->validate([
            'email' => 'required|email|unique:users',
            'login' => 'required',
            'password' => 'required',
            'name' => 'required',
            'surname' => 'required',
        ]);

        $user = User::create([
            'email' => $validate['email'],
            'login' => $validate['login'],
            'password' => $validate['password'],
            'name' => $validate['name'] . ' ' . $validate['surname'],
        ]);
        if($user){
            Auth::login($user);
            return redirect(route('index'));
        }
    }

    public function login(Request $request){
        if(Auth::check()){
            return redirect(route('index'));
        }
        $form = $request->only(['login', 'password']);
        if(Auth::attempt($form)){
            if(Auth::user()->ban == 1){
                Auth::logout();
                return redirect(route('login'))->withErrors([
                    'form' => "Вы заблокированы, обратитесь к админестратору!"
                ]);
            }
            return redirect(route('index'));
        }

        return redirect(route('login'))->withErrors([
            'form' => "Проверьте почту или пароль"
        ]);
    }

    public function logout(){
        if(!Auth::check()){
            return redirect(route('index'));
        }
        Auth::logout();
        return redirect(route('index'));
    }

}
