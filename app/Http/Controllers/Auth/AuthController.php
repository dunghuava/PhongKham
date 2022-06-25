<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function info(){
        $response = [
            '_login' => Auth::check()
        ];
        return $this->response($response);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $this->response($validator->errors(),401);
        }

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return $this->response([
                'status' => 'error',
                'message' => 'Tên tài khoản hoặc mật khẩu không chính xác'
            ], 401);
        }

        return $this->response([
            'status' => 'success',
            'message' => 'Đăng nhập thành công',
            'reload' => true,
            'redirect' => '/'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return $this->response([
            'status' => 'error',
            'message' => 'Vui lòng đăng nhập để tiếp tục làm việc',
            'reload' => true,
            'redirect' => '/auth/login'
        ]);
    }
}
