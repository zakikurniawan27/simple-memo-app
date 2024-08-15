<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator\erros;
use \App\Models\User as user;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function log(Request $request){
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        if(Auth::attempt($validate))
        {
            $request->session()->regenerate();
            return redirect()->intended('/')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');


    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->withSuccess('Berhasil logout');
    }

    public function registrasi(){
        return view('auth.registrasi');
    }

    public function reg(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        user::create($data);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        return redirect()->route('home')->withSuccess('Berhasil registrasi dan login!');
    }
}
