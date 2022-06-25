<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    //
    function init()
    {
        // TODO: Implement init() method.
    }

    function index()
    {
        // TODO: Implement index() method.
        $user = Auth::user();
        return $this->response($user);
    }

    function updateProfile(Request $request){

        try {

            $rules = [
                'name' => 'required',
                'email' => 'required',
            ];

            if (!empty($request->password)) {
                $rules = array_merge($rules, [
                    'password' => 'required|min:6',
                    'repassword' => 'required|min:6|same:password',
                ]);
            }

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response($validator->errors(), 401);
            }

            $id = $request->id ?? 0;

            $user = User::find($id);

            if ($user) {
                $user->name = $request->name;
                $user->email = $request->email;
                if (!empty($request->password) && $request->password == $request->repassword) {
                    $user->password = bcrypt($request->password);
                }
                if(!$user->save()){
                    throw new \Exception('Cập nhật thông tin thất bại');
                }
                return response([
                    'status' => 'success',
                    'message' => 'Cập nhật thông tin thành công'
                ]);
            }

            throw new \Exception('Người dùng không tồn tại');

        }catch (\Exception $exception) {
            return response([
                'status' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }
}
