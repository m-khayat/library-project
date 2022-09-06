<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class CartsController extends Controller
{
    public function show($id)
    {
     $cart = Cart::find($id);
     if (isset($cart)){
     $response['data'] = $cart;
     $response['message'] = "This is all book";
     return  response()->json($response,200);
     }
    }
 public function store(Request $request )
    {
        $cart = new Cart();
        $cart->total_value = $request->total_value;
        $cart->user_id = Auth::user()->id;

        $cart->save();
        $response['data'] = $cart;
        $response['message'] = " stored Successfully";
        return  response()->json($response,200);
        
    }
public function destroy($id)
    {
         $cart = Cart::find($id);
  if (isset($cart)) {
        $cart->delete();
        $response['data'] = '';
        $response['message'] = " Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
}  
}
