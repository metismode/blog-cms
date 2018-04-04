<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(){
        //fetch all posts data
        $posts = Post::orderBy('updated_at','desc')->get();

        //pass posts data to view and load list view
        return view('posts.index', ['posts' => $posts]);
    }

    public function add(){
        //load form view
        return view('posts.add');
    }

    public function details($id){
        //fetch post data
        $post = Post::find($id);

        //pass posts data to view and load list view
        return view('posts.details', ['post' => $post]);
    }

    public function edit($id){
        //get post data by id
        $post = Post::find($id);
        //load form view
        return view('posts.edit', ['post' => $post]);
    }


    public function insert(Request $request){

        setlocale(LC_TIME, 'Asia/Bangkok');
        $post = new Post();

        //validate post data
        $data = $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        //insert post data
        $post->user_id = auth()->user()->id;
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->save();

        //store status message
        Session::flash('success_msg', 'Post added successfully!');

        return redirect()->route('posts.index');
    }


    public function update($id, Request $request){

        $post = new Post();

        //validate post data
        $data = $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        //update post data
        $post = Post::find($id);
        $post->user_id = auth()->user()->id;
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->save();

        //store status message
        Session::flash('success_msg', 'Post updated successfully!');

        return redirect()->route('posts.index');
    }

    public function delete($id){

        //update post data
        $ticket = Post::find($id);
        $ticket->delete();

        //store status message
        Session::flash('success_msg', 'Post deleted successfully!');

        return redirect()->route('posts.index');
    }
}
