<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRating;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class UserRatingController extends Controller
{
    
    public function store(Request $request , $id)
    {

        $rate=UserRating::where('product_id',$id)->where('user_id',Auth::user()->id)->first();
        $rate = new UserRating();
		$rate->rating = $request->rating;
		$rate->user_id = auth()->user()->id;
		$rate->product_id = $id;

        $rate->save();
        $product=Product::find($id);
        $product->rate= UserRating::where('product_id',$id)->first()->avg('rating') ;
        $product->save();
        $response['data'] = $rate;
        $response['message'] = "Added Successfully";
        return  response()->json($response,200);
        
    }

}
