<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentArticale;
use Illuminate\Support\Facades\Auth;
class CommentArticleController extends Controller
{
  public function index($id)
  {
   $comments = CommentArticale::where('article_id', $id) ->get();
   
   return $comments ;
  }
    public function store(Request $request)
    {
        $comment = new CommentArticale();
		$comment->line = $request->line;
		$comment->user_id = Auth::user()->id;
		$comment->article_id = $request->article_id;

        $comment->save();
        $response['data'] = $comment;
        $response['message'] = "Added Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id)
    {
    $comment = CommentArticale::where('id' , $id)->first();
    if (isset($comment))
    {
      if (isset($request->line)){
        $comment->line = $request->line;}

      if (isset($request->user_id)){
        $comment->user_id = $request->user_id;}

      if (isset($request->article_id)){
        $comment->article_id = $request->article_id;}

        $comment->save();
        $response['data'] = $comment;
        $response['message'] = "Update Successfully ";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);

    }
    public function destroy($id)
    {
         $comment = CommentArticale::find($id);
  if (isset($comment)) {
        $comment->delete();
        $response['data'] = '';
        $response['message'] = "Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
}
}
