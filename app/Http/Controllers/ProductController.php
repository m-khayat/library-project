<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
     $Products = Product::all();
     $response['data'] = $Products;
     $response['message'] = "This is all Products";
     return  response()->json($response,200);
    }

    public function price_descending()
    {
     $Products = Product::orderBy('price' , 'desc')->get();
     $response['data'] = $Products;
     $response['message'] = "This is all Products";
     return  response()->json($response,200);
    }

    public function price_progressive()
    {
     $Products = Product::orderBy('price')->get();
     $response['data'] = $Products;
     $response['message'] = "This is all Products";
     return  response()->json($response,200);
    }

    public function view_descending()
    {
     $Products = Product::orderBy('count_view' , 'desc')->get();
     $response['data'] = $Products;
     $response['message'] = "This is all Products";
     return  response()->json($response,200);
    }

    public function view_progressive()
    {
     $Products = Product::orderBy('count_view')->get();
     $response['data'] = $Products;
     $response['message'] = "This is all Products";
     return  response()->json($response,200);
    }

    public function rate_progressive()
    {
     $Products = Product::orderBy('rate')->get();
     $response['data'] = $Products;
     $response['message'] = "This is all Products";
     return  response()->json($response,200);
    }


    public function show($id)
    {
    $product = Product::find($id);
    if (isset($product)) {
       $response['data'] = $product;
       $response['message'] = "Success";
       return  response()->json($response,200);

    }
       $response['data'] = $product;
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);
    
    }
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
		$product->price = $request->price;
		$product->description = $request->description;
		$product->is_offer = $request->is_offer;
		$product->offer_discount = $request->offer_discount;
		$product->category_id = $request->category_id;
		$product->author_id = $request->author_id;

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationpath = public_path('/upload');
        $image->move($destinationpath , $name);
        $product->image = $name;

        $product->save();
        $response['data'] = $product;
        $response['message'] = "Product Added Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id)
    {
    $product = Product::where('id' , $id)->first();
    if (isset($product))
    {
      if (isset($request->name)){
        $product->name = $request->name;}

      if (isset($request->price)){
        $product->price = $request->price;}

      if (isset($request->description)){
        $product->description = $request->description;}

      if (isset($request->is_offer)){
        $product->is_offer = $request->is_offer;}

      if (isset($request->offer_discount)){
        $product->offer_discount = $request->offer_discount;}

        if (isset($request->category_id)){
          $product->category_id = $request->category_id;}

          if (isset($request->author_id)){
            $product->author_id = $request->author_id;}

      if (isset($request->image)) 
            { 
               $image = $request->file('image');
               $name = time().'.'.$image->getClientOriginalExtension();
               $destinationpath = public_path('/upload');
               $image->move($destinationpath , $name);
               $product->image = $name;
           }

        $product->save();
        $response['data'] = $product;
        $response['message'] = "Update Successfully ";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);

    }
    public function destroy($id)
    {
         $product = Product::find($id);
  if (isset($product)) {
        $product->delete();
        $response['data'] = '';
        $response['message'] = "Product Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
}
public function SearchByProduct(Request $request) 
{

    $data = $request->get('data');

    $search_product = Product::where('name', 'like', "%{$data}%")->get();
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
