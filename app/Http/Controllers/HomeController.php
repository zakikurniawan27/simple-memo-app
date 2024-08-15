<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post as post;
use \App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){

        if(Auth::check()){
            $id = Auth::user()->id;
            $post = User::join('posts','users.id','=','posts.user_id')->where('users.id','=',$id)->get();
            return view('index', compact('post'));
        }
        return view('firstPage');
    }
}
