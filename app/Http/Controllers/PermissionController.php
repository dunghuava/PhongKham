<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = Permission::orderBy('id','desc')->paginate();
        return $this->response($paginate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $request->merge([
            'guard_name' => preg_replace('/[^a-zA-Z_]/','',$request->guard_name)
        ]);
        Permission::create($request->all());
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
    public function show(Permission $permission)
    {
        if(!$permission){
            return $this->response([
                'status' => 'error',
                'message' => trans('action.get.error')
            ],404);
        }
        return $this->response($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $request->merge([
            'guard_name' => preg_replace('/[^a-zA-Z_]/','',$request->guard_name)
        ]);
        if($permission){
            $permission->update($request->all());
            return $this->response([
                'status' => 'success',
                'message' => trans('action.update.success')
            ]);
        }
        return $this->response([
            'status' => 'error',
            'message' => trans('action.update.error')
        ],404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        if($permission->delete()){
            return $this->response([
                'status' => 'success',
                'message' => trans('action.delete.success')
            ]);
        }
    }
}
