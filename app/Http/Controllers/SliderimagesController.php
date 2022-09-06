<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliderimage;
class SliderimagesController extends Controller
{
    public function index()
    {
     $images = Sliderimage::all();
     $response['data'] = $images;
     $response['message'] = "This is all categories";
     return  response()->json($response,200);
    }
    
    public function store(Request $request)
    {
        $imaage = new Sliderimage();
        $imaage->slider_id = $request->slider_id;

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationpath = public_path('/upload');
        $image->move($destinationpath , $name);
        $imaage->image = $name;

        $imaage->save();
        $response['data'] = $imaage;
        $response['message'] = "Category Created Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id)
    {
    $imaage = Sliderimage::where('id' , $id)->first();
    if (isset($imaage))
    {
        if (isset($request->slider_id)){
        $imaage->slider_id = $request->slider_id;}

        if (isset($request->image)) 
        { 
           $image = $request->file('image');
           $name = time().'.'.$image->getClientOriginalExtension();
           $destinationpath = public_path('/upload');
           $image->move($destinationpath , $name);
           $imaage->image = $name;
       }

        $imaage->save();
        $response['data'] = $image;
        $response['message'] = "Update Successfully ";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);

    }
    public function destroy($id)
    {
         $image = Sliderimage::find($id);
  if (isset($image)) {
        $image->delete();
        $response['data'] = '';
        $response['message'] = "Image Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
}  
}
