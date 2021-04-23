<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $request->validate(
            [
                'email'=> 'required|email',
                'password'=> 'required|min:8|max:20',
            ]
        );
        $userInfo = User::where('email','=',$request->email)->first();
        if(!$userInfo){
            return back()->with('Failed','Your Email Not Found');
        }
        else{
            if($userInfo->password === $request->password){
                $request->session()->put('LoggedIn',$userInfo);
                return redirect(url('/posts'));
            }
            else{
                return back()->with('Failed','Invalid Password');
            }
        }
    }
    public function register(){
        return view('posts.register');
    }
    public function signup(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'email'=> 'required|email|unique:users',
                'role' => 'required',
                'password'=> 'required|min:8|max:20',
            ]
        );
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = $request->password;
        $user->save();
        return redirect(url('/posts'));
    }
    public function logout(){
        if(session()->has('LoggedIn')){
            session()->pull('LoggedIn');
            return redirect(url('/posts'));
        }
    }
}
