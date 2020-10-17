<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\CreatePostRequest;

class HomeController extends Controller
{
    //
    public function ProductPage(){
        return view('pages.product');
    }
    
    public function store(CreatePostRequest $request){
        
        #there ae several way to store data in database
        
        return $request->all(); //to return what we are getting from input
        
        Post::create($request->all());
        
        $input = $request->all();
        $input['title'] = $request->title;
        
        $post = new Post;
        $post->title = $request->title;
        $post->save();
        
        #to vaidate the form or form validation 
        #or we can also validate this request from ['CreatePostRequest'] 
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'publish_at' => 'nullable|date',
        ]);
        
        
    }
}
