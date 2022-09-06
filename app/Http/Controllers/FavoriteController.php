<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoriteProduct;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
class FavoriteController extends Controller
{
public function index(){
    
    $favorites = FavoriteProduct::all()->where('user_id',auth()->user()->id);
    
     return   $favorites;
}


    public function store($id)
 {
    $favorite=FavoriteProduct::where('product_id',$id)->where('user_id',Auth::user()->id)->first();
    if(!$favorite)
    {
  $favorite=new FavoriteProduct();
  $favorite->product_id=$id;
  $favorite->user_id=auth()->user()->id;
  $favorite->save();
  $product=Product::find($id);
  $product->save();
    }
  if (isset($product)) {
    $response['data'] = $product;
    $response['message'] = "Success";
    return  response()->json($response,200);
    }
    else
  {
        $product = Product::find($id);
  if (isset($product)) 
    {
        $favorite->delete();
  return response()->json(['massage'=>'deleted successfuly'],200);
    } 
  }
 }


 public function SearchByUser(Request $request) 
{

    $data = $request->get('data');

    $search_product = Product::where('user_id', $data)
    ->get();
    if (count($search_product)){
       $response['data'] = $search_product;
       $response['message'] = "success";
       return response()->json([$response,200]);     
   }
   else
   {
    return response()->json(['message' => ' Data not found'], 404);
}

}
}
