<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartProduct;
use App\Models\Product;
class CartProductController extends Controller
{
    public function index()
    {
     $cart_products = CartProduct::all();
     $response['data'] = $cart_products;
     $response['message'] = "This is all ";
     return  response()->json($response,200);
    }
public function store(Request $request)
    {
        $cart_product = new CartProduct();
        $cart_product->product_id = $request->product_id;
        $cart_product->cart_id = $request->cart_id;

        $cart_product->save();
        $response['data'] = $cart_product;
        $response['message'] = " Created Successfully";
        return  response()->json($response,200);
        
    }
public function destroy($id)
    {
         $cart_product = CartProduct::find($id);
  if (isset($cart_product)) {
        $cart_product->delete();
        $response['data'] = '';
        $response['message'] = "Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
}  
}
