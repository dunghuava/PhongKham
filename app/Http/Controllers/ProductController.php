<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $items = Product::paginate();
        return $this->response($items);
    }

    public function delete(Request $request){
        try{
            $deleted = Product::find($request->id)->delete();
            return $this->response([
                'status' => 'success',
                'message' => 'Đã xóa sản phẩm'
            ]);
        }catch(\Exception $e){
            return $this->response([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500);
        }
    }

    public function getItem(Request $request){
        $item = Product::find($request->id);
        if(!$item){
            return $this->response([
                'status' => 'error',
                'message' => 'Không tìm thấy dữ liệu yêu cầu'
            ],404);
        }
        return $this->response($item);
    }

    public function saveItem(Request $request){
        $action = $request->action ?? 'create';
        $item = new Product();
        if($action == 'update'){
            $item = Product::find($request->id);
        }
        $item->code = $request->code;
        $item->name = $request->name;
        $item->price = (double) str_replace(',','',$request->price);
        $item->status = (int) $request->status;

        if($item->save()){
            return $this->response([
                'status' => 'success',
                'message' => 'Cập nhật thành công'
            ]);
        }
        return $this->response([
            'status' => 'error',
            'message' => 'Không thể cập nhật sản phẩm'
        ],404);
    }
}
