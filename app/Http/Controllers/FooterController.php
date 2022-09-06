<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;
class FooterController extends Controller
{
    public function index()
    {
     $footers = Footer::all();
     $response['data'] = $footers;
     $response['message'] = "This is all footers";
     return  response()->json($response,200);
    }
    public function show($id)
    {
    $footer = Footer::find($id);
    if (isset($footer)) {
       $response['data'] = $footer;
       $response['message'] = "Success";
       return  response()->json($response,200);

    }
       $response['data'] = $footer;
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);
    
    }
    public function store(Request $request)
    {
        $footer = new Footer();
		$footer->term_of_use = $request->term_of_use;
		$footer->term_of_sale = $request->term_of_sale;
		$footer->location = $request->location;
		$footer->facebook_link = $request->facebook_link;
		$footer->instagram_link = $request->instagram_link;
		$footer->twitter_link = $request->twitter_link;
		$footer->opining_time = $request->opining_time;

        $footer->save();
        $response['data'] = $footer;
        $response['message'] = "Footer Added Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id)
    {
    $footer = Footer::where('id' , $id)->first();
    if (isset($footer))
    {
      if (isset($request->term_of_use)){
        $footer->term_of_use = $request->term_of_use;}

      if (isset($request->term_of_sale)){
        $footer->term_of_sale = $request->term_of_sale;}

      if (isset($request->location)){
        $footer->location = $request->location;}

        if (isset($request->facebook_link)){
        $footer->facebook_link = $request->facebook_link;}

        if (isset($request->instagram_link)){
        $footer->instagram_link = $request->instagram_link;}

        if (isset($request->twitter_link)){
        $footer->twitter_link = $request->twitter_link;}

        if (isset($request->opining_time)){
        $footer->opining_time = $request->opining_time;}

        $footer->save();
        $response['data'] = $footer;
        $response['message'] = "Update Successfully ";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);

    }
    public function destroy($id)
    {
         $footer = Footer::find($id);
  if (isset($footer)) {
        $footer->delete();
        $response['data'] = '';
        $response['message'] = "Footer Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
}
}
