<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = Role::with('permissions')->orderBy('id','desc')->paginate();
        return $this->response($paginate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $request->merge([
            'guard_name' => preg_replace('/[^a-zA-Z_]/','',$request->guard_name)
        ]);
        Role::create($request->all());
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
    public function show(Role $role)
    {
        if(!$role){
            return $this->response([
                'status' => 'error',
                'message' => trans('action.get.error')
            ],404);
        }
        return $this->response($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($role->delete()){
            return $this->response([
                'status' => 'success',
                'message' => trans('action.delete.success')
            ]);
        }
    }
}
