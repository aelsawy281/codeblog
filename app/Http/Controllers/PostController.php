<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    //show all posts
    function posts(){
        //latest() order data in table by cteated at
         $posts=Post::latest()->get();
        return view('posts',[
            "posts"=>$posts
           
        ]);
    }
    // show post of id
    function show($id){
       $post=Post::find($id);
        return view('show',[
            'post'=>$post
        ]);
        
    }
    //search for post that contain special characters in title or body
    function search($keyword){
      
      $posts=Post::where('title', 'like', '%' .$keyword. '%')->orwhere('body', 'like', '%' .$keyword. '%')->get();
        return view('search',[
            'posts'=>$posts
        ]);
    }
    //search for latest 
    function late($num){
      //return "true";
       $posts=Post::latest()->limit($num)->get();
         return $posts;
    }
    //create form 
     function create(){
        return view('create');
    }
    //store data in db
     function store(Request $request){
        //validate
         $validator = \Validator::make($request->all(), 
    [ 
     'title' => 'required|max:100|min:3', 
     'body' => 'required|min:3', 
     //'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
]); 
        if($validator->fails()) 
        { 
    return redirect('posts/update')->withErrors($validator)->withInput();
        }

        //new book
        $post=new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();
        return redirect('posts');
    }
    
    //update
    //first step
     function edit($id){
        $post=Post::find($id);
        
        return view('edit',[
            'post'=>$post
        ]);
    }
  //second step
    function update(Request $request , $id){
         
        $post=Post::find($id);
         //validate
         $validator = \Validator::make($request->all(), 
    [ 
     'title' => 'required|max:100|min:3', 
     'body' => 'required|min:3', 
     //'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
]); 
        if($validator->fails()) 
        { 
    return redirect('posts/create')->withErrors($validator)->withInput();
        }
        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();
        return redirect('posts');
    }
    //delete post
  function delete($id){
        $post=Post::find($id);
        $post->delete();
        return redirect('posts');
    }
}
