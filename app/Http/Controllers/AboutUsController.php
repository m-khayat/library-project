<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
class AboutUsController extends Controller
{
    public function index()
    {
     $aboutuss = AboutUs::all();
     $response['data'] = $aboutuss;
     $response['message'] = "This is all aboutuss";
     return  response()->json($response,200);
    }
    public function show($id)
    {
    $aboutus = AboutUs::find($id);
    if (isset($aboutus)) {
       $response['data'] = $aboutus;
       $response['message'] = "Success";
       return  response()->json($response,200);

    }
       $response['data'] = $aboutus;
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);
    
    }
    public function store(Request $request)
    {
        $aboutus = new AboutUs();
		$aboutus->know_more = $request->know_more;
		$aboutus->our_joruny = $request->our_joruny;
		$aboutus->video_link = $request->video_link;

        $aboutus->save();
        $response['data'] = $aboutus;
        $response['message'] = "Added Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id)
    {
    $aboutus = AboutUs::where('id' , $id)->first();
    if (isset($aboutus))
    {
      if (isset($request->know_more)){
        $aboutus->know_more = $request->know_more;}

      if (isset($request->our_joruny)){
        $aboutus->our_joruny = $request->our_joruny;}

      if (isset($request->video_link)){
        $aboutus->video_link = $request->video_link;}

        $aboutus->save();
        $response['data'] = $aboutus;
        $response['message'] = "Update Successfully ";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);

    }
    public function destroy($id)
    {
         $aboutus = AboutUs::find($id);
  if (isset($aboutus)) {
        $aboutus->delete();
        $response['data'] = '';
        $response['message'] = "Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
}
}
