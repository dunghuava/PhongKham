<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = Product::fillter($request)->orderBy('id','desc')->paginate();
        return $this->response($paginate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->merge([
            'price' => preg_replace('/[^0-9]/','',$request->price)
        ]);
        Product::create($request->all());
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
    public function show(Product $product)
    {
        if(!$product){
            return $this->response([
                'status' => 'error',
                'message' => trans('action.get.error')
            ],404);
        }
        return $this->response($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $request->merge([
            'price' => preg_replace('/[^0-9]/','',$request->price)
        ]);
        if($product){
            $product->update($request->all());
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
    public function destroy(Product $product)
    {
        if($product->delete()){
            return $this->response([
                'status' => 'success',
                'message' => trans('action.delete.success')
            ]);
        }
    }
}
