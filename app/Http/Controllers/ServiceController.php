<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = Service::fillter($request)->orderBy('id','desc')->paginate();
        return $this->response($paginate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $request->merge([
            'price' => preg_replace('/[^0-9]/','',$request->price)
        ]);
        Service::create($request->all());
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
    public function show(Service $service)
    {
        if(!$service){
            return $this->response([
                'status' => 'error',
                'message' => trans('action.get.error')
            ],404);
        }
        return $this->response($service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $request->merge([
            'price' => preg_replace('/[^0-9]/','',$request->price)
        ]);
        if($service){
            $service->update($request->all());
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
    public function destroy(Service $service)
    {
        if($service->delete()){
            return $this->response([
                'status' => 'success',
                'message' => trans('action.delete.success')
            ]);
        }
    }
}
