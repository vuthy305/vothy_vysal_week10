<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::paginate(10);
        return view('posts.index',['posts'=>$posts]);
    }
    public function create(){
        return view('posts.create');
    }
    public function store(Request $request){
        $request->validate(
            [
                'title'=>'required|unique:posts',
                'description'=>'required',
                'category_id'=>'required',
                'user_email'=>'required'
            ]
        );
        $posts = new Post;
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->category_id = $request->category_id;
        $posts->user_email = $request->user_email;
        $posts->save();

        return redirect(route('post'));
    }
    public function edit(Post $post){
        $data = $post;
        return view('posts.update',['data'=>$data]);
    }
    public function update(Request $request,Post $post){

        $request->validate(
            [
                'title'=>'required|unique:posts',
                'description'=>'required',
                'category_id'=>'required',
                'user_email'=>'required'
            ]
        );
 
        $posts = Post::findOrFail($post->id);
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->category_id = $request->category_id;
        $posts->user_email = $request->user_email;
        $posts->save();
 
        return redirect(route('post'));
     }
     public function delete(Post $post){
        $data = $post;
        return view('posts.delete',['data'=>$data]);
    }
    public function destroy(Post $post){
        $post->delete();
        return redirect(route('post'));
    }
}
