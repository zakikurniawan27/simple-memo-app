<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Post as post;
use \App\Models\User;

class PostController extends Controller
{
    public function create(string $id){

        $dataUser = User::find($id);
        if(Auth::check()){
            return view('create', compact('dataUser'));
        }

        return redirect()->route('login');
    }

    public function store(Request $request, string $id){
        $this->validate($request,[
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        $post['user_id'] = $id;
        $post['title'] = $request->title;
        $post['content'] = $request->content;

        post::create($post);

        return redirect()->route('home');
    }

    public function edit(string $id){
        $ubah = post::find($id);

        return view('edit', compact('ubah'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        $up['title'] =  $request->title;
        $up['content'] = $request->content;

        post::whereId($id)->update($up);

        return redirect()->route('home');
    }

    public function trash($id){
        $del = post::find($id);

        $del->delete();

        return redirect()->route('home');
    }
}
