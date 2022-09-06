<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewProducts;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ViewProductController extends Controller
{
  public function index($id)
  {
  $view=ViewProducts::where('product_id',$id)->where('user_id',Auth::user()->id)->first();
  if(!$view)
  {
$view=new ViewProducts();
$view->product_id=$id;
$view->user_id=auth()->user()->id;
$view->save();
$product=Product::find($id);
$product->count_view ++;
$product->save();
return response()->json(['massage'=>'view added'],200);
  }
  else{
return response()->json(['massage'=>'already added'],404);


  }
}
}
