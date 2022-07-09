<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = User::fillter($request)->orderBy('id', 'desc')->paginate();
        return $this->response($paginate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request->merge([
            'username' => preg_replace('/[^a-zA-Z0-9]/', '', $request->get('username')),
            'password' => bcrypt($request->get('password'))
        ]);

        User::create($request->all());

        return $this->response([
            'status' => 'success',
            'message' => trans('action.create.success')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (!$user) {
            return $this->response([
                'status' => 'error',
                'message' => trans('action.get.error')
            ], 404);
        }
        return $this->response($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $request->merge([
            'username' => preg_replace('/[^a-zA-Z0-9]/', '', $request->get('username'))
        ]);

        if ($request->get('password') && !is_null($request->get('password'))) {
            $request->merge([
                'password' => bcrypt($request->get('password'))
            ]);
        }

        if ($user) {
            $user->update($request->all());
            return $this->response([
                'status' => 'success',
                'message' => trans('action.update.success')
            ]);
        }
        return $this->response([
            'status' => 'error',
            'message' => trans('action.update.error')
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id != Auth::id() && $user->delete()) {
            return $this->response([
                'status' => 'success',
                'message' => trans('action.delete.success')
            ]);
        }
        return $this->response([
            'status' => 'error',
            'message' => trans('action.delete.error')
        ]);
    }
}
