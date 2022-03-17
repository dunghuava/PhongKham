<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    function init()
    {
        // TODO: Implement init() method.
    }

    public function index()

    {
        // TODO: Implement index() method.
    }

    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;
        $data = [
            'username' => $username,
            'password' => $password
        ];

        if(Auth::attempt($data,true)){
            return response([
                'status'=>'success',
                'message'=>'Đăng nhập thành công',
                'redirect'=>'/',
            ]);
        }

        return response([
            'status'=>'error',
            'message'=>'Thông tin đăng nhập không chính xác',
        ],404);
    }

    public function checkUserLogin(){
        if(Auth::check()){
            return response([
                'status'=>'success',
                'message'=>'Bạn đã đăng nhập',
                'redirect'=>'/'
            ]);
        }
        return [];
    }

    public function logout(){
        Auth::logout();
    }
}
