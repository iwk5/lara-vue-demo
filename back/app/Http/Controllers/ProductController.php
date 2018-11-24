<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class ProductController extends Controller
{
    public function index(){
        return Product::orderBy('created_at','desc')->get();
    }
    public function store(Request $request){
        $product= Product::create($request->all() + ['user_id'=>Auth::id()]);
        return $request->all();
    }

    public function show($id){
        $product=Product::find($id);
        if(count($product)>0)
        {
            return response()->json($product);
        }else{
            return response()->json(['error'=>'No data found!'],404);
        }

    }

    public function update(Request $request, $id){
        $product=Product::find($id);
        $product->update($request->all());
        return response()->json($product);

    }
    public function destroy($id){
        try{
            Product::destroy($id);
            return response([],2014);
        }
        catch (\Exception $ex){
            return response(['Something went wrong while deleting product',500]);
        }
    }

}
