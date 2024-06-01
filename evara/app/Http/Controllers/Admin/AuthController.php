<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    ####      Register      ####

    public function registerPage(){
        return view('admin.auth.registerPage');
    }

    public function register(RegisterRequest $request){
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' =>  Hash::make($data['password']),
        ]);
        
        Auth::login($user);
        return to_route('admin.index');
    }

    ####      Login      ####
    public function loginPage(){
        return view('admin.auth.loginPage');
    }

    public function login(LoginRequest $request){
        $data = $request->validated();

        $user = User::where('email',$data['email'])->first();
        $check = Hash::check($data['password'],$user->password);

        if(!$check){
            return back()->with('error_password','password is incorrect');
        }

        Auth::attempt($data);
        return to_route('admin.index');
    }

    ####      Logout      ####
    public function logout(){
        Auth::logout();
        return to_route('admin.loginPage');
    }

}
