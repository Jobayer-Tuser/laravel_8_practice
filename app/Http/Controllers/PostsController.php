<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{

    public function getAllPost(){

        #return Post::all();
        #$posts = Post::orderBy('title', 'desc')->get();
        #$posts = Post::orderBy('title', 'desc')->take(1)->get();
        #$posts = Post::orderBy('title', 'desc')->paginate(5);
        #$posts = Post::Where('title', 'Post 2')->get();
        $posts = Post::all();

        return view('posts.index')->with('posts', $posts);
    }

    public function show($id){

        #return Post::find($id);
        $posts = Post::find($id);
        return view('posts.show')->with('posts', $posts);
    }

    public function create(){

        return view('posts.create');
    }

    public function addData(Request $req){
        $newPosts = new Post;
        $newPosts->title = $req->title;
        $newPosts->body = $req->description;
        $newPosts->save();
        return redirect('posts');
    }
}
