<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
class OwnerController extends Controller
{
    public function index()
    {
     $owners = Owner::all();
     $response['data'] = $owners;
     $response['message'] = "This is all owners";
     return  response()->json($response,200);
    }
    public function show($id)
    {
    $owner = Owner::find($id);
    if (isset($owner)) {
       $response['data'] = $owner;
       $response['message'] = "Success";
       return  response()->json($response,200);

    }
       $response['data'] = $owner;
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);
    
    }
    public function store(Request $request)
    {
        $owner = new Owner();
        $owner->name = $request->name;
		$owner->birth_date = $request->birth_date;
		$owner->facebook_link = $request->facebook_link;
		$owner->instagram_link = $request->instagram_link;
		$owner->twitter_link = $request->twitter_link;
		$owner->resum = $request->resum;
		$owner->position = $request->position;

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationpath = public_path('/upload');
        $image->move($destinationpath , $name);
        $owner->image = $name;

        $owner->save();
        $response['data'] = $owner;
        $response['message'] = "Owners Added Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id)
    {
    $owner = Owner::where('id' , $id)->first();
    if (isset($owner))
    {
      if (isset($request->name)){
        $owner->name = $request->name;}

      if (isset($request->birth_date)){
        $owner->birth_date = $request->birth_date;}

      if (isset($request->facebook_link)){
        $owner->facebook_link = $request->facebook_link;}

      if (isset($request->instagram_link)){
        $owner->instagram_link = $request->instagram_link;}

      if (isset($request->twitter_link)){
        $owner->twitter_link = $request->twitter_link;}

      if (isset($request->resum)){
        $owner->resum = $request->resum;}

      if (isset($request->position)){
        $owner->position = $request->position;}

      if (isset($request->image)) 
            { 
               $image = $request->file('image');
               $name = time().'.'.$image->getClientOriginalExtension();
               $destinationpath = public_path('/upload');
               $image->move($destinationpath , $name);
               $owner->image = $name;
           }

        $owner->save();
        $response['data'] = $owner;
        $response['message'] = "Update Successfully ";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);

    }
    public function destroy($id)
    {
         $owner = Owner::find($id);
  if (isset($owner)) {
        $owner->delete();
        $response['data'] = '';
        $response['message'] = "Owners Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
}
}
