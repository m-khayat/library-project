<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CommentArticleController;
use App\Http\Controllers\CommentProductController;
use App\Http\Controllers\ViewProductController;
use App\Http\Controllers\UserRatingController;
use App\Http\Controllers\SliderimagesController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FatoorahController;
use App\Http\Controllers\CartProductController;
use App\Http\Controllers\CartsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

            // UsersController.Api

        Route::post("register", [UsersController::class, "register"]);
        Route::post("login", [UsersController::class, "login"]);

     Route::group(["middleware"=> ["auth:api"]],function(){

        Route::get("profile", [UsersController::class, "profile"]);
        Route::post("logout", [UsersController::class, "logout"]);

    });
            // CategoriesController.Api

        Route::post("create_category", [CategoriesController::class, "store"]);
        Route::post("update_category/{id}", [CategoriesController::class, "update"]);
        Route::delete("delete_category/{id}", [CategoriesController::class, "destroy"]);
        Route::get("list_categories", [CategoriesController::class, "index"]);
        Route::get("single_category/{id}", [CategoriesController::class, "show"]);

            // AuthorsController.Api

        Route::post("create_author", [AuthorsController::class, "store"]);
        Route::post("update_author/{id}", [AuthorsController::class, "update"]);
        Route::delete("delete_author/{id}", [AuthorsController::class, "destroy"]);
        Route::get("list_authors", [AuthorsController::class, "index"]);
        Route::get("single_auther/{id}", [AuthorsController::class, "show"]);
        Route::get("search_authers", [AuthorsController::class, "SearchByAuthers"]);


            // ProductController.Api

        Route::post("create_product", [ProductController::class, "store"]);
        Route::post("update_product/{id}", [ProductController::class, "update"]);
        Route::delete("delete_product/{id}", [ProductController::class, "destroy"]);
        Route::get("list_products", [ProductController::class, "index"]);
        Route::get("single_product/{id}", [ProductController::class, "show"]);
        Route::get("search_products", [ProductController::class, "SearchByProduct"]);
        Route::get("list_products_acs_by_price", [ProductController::class, "price_progressive"]);
        Route::get("list_products_decs_by_price", [ProductController::class, "price_descending"]);
        Route::get("list_products_acs_by_view", [ProductController::class, "view_progressive"]);
        Route::get("list_products_decs_by_view", [ProductController::class, "view_descending"]);
        Route::get("list_products_ace_by_rate", [ProductController::class, "rate_progressive"]);

        Route::get('search_by_user/',[FavoriteController::class, "SearchByUser"]);


            // OwnerController.Api

        Route::post("create_owner", [OwnerController::class, "store"]);
        Route::post("update_owner/{id}", [OwnerController::class, "update"]);
        Route::delete("delete_owner/{id}", [OwnerController::class, "destroy"]);
        Route::get("list_owners", [OwnerController::class, "index"]);
        Route::get("single_owner/{id}", [OwnerController::class, "show"]);
    

         // ArticleController.Api

        Route::post("create_article", [ArticleController::class, "store"]);
        Route::post("update_article/{id}", [ArticleController::class, "update"]);
        Route::delete("delete_article/{id}", [ArticleController::class, "destroy"]);
        Route::get("list_articles", [ArticleController::class, "index"]);
        Route::get("single_article/{id}", [ArticleController::class, "show"]);
        Route::get("search_articles", [ArticleController::class, "SearchByArticles"]);


           // SliderController.Api

        Route::post("create_slider", [SliderController::class, "store"]);
        Route::post("update_slider/{id}", [SliderController::class, "update"]);
        Route::delete("delete_slider/{id}", [SliderController::class, "destroy"]);
        Route::get("list_sliders", [SliderController::class, "index"]);
        Route::get("single_slider/{id}", [SliderController::class, "show"]);


         // FooterController.Api

        Route::post("create_footer", [FooterController::class, "store"]);
        Route::post("update_footer/{id}", [FooterController::class, "update"]);
        Route::delete("delete_footer/{id}", [FooterController::class, "destroy"]);
        Route::get("list_footers", [FooterController::class, "index"]);
        Route::get("single_footer/{id}", [FooterController::class, "show"]);


        // AboutUsController.Api

        Route::post("create_aboutus", [AboutUsController::class, "store"]);
        Route::post("update_aboutus/{id}", [AboutUsController::class, "update"]);
        Route::delete("delete_aboutus/{id}", [AboutUsController::class, "destroy"]);
        Route::get("list_aboutuss", [AboutUsController::class, "index"]);
        Route::get("single_aboutus/{id}", [AboutUsController::class, "show"]);


        // CommentArticleController.Api

     Route::group(["middleware"=> ["auth:api"]],function(){

        Route::post("create_article_comment", [CommentArticleController::class, "store"]);
        Route::post("update_article_comment/{id}", [CommentArticleController::class, "update"]);
        Route::delete("delete_article_comment/{id}", [CommentArticleController::class, "destroy"]);

    });
        Route::get("list_article_comments/{id}", [CommentArticleController::class, "index"]);

         // CommentProductController.Api

     Route::group(["middleware"=> ["auth:api"]],function(){

        Route::post("create_product_comment", [CommentProductController::class, "store"]);
        Route::post("update_product_comment/{id}", [CommentProductController::class, "update"]);
        Route::delete("delete_product_comment/{id}", [CommentProductController::class, "destroy"]);

    });
        Route::get("list_product_comments/{id}", [CommentProductController::class, "index"]);

        // ViewProductController.Api

     
        Route::middleware('auth:api')->post("list_product_views/{id}", [ViewProductController::class, "index"]);


        // UserRatingController.Api

     Route::group(["middleware"=> ["auth:api"]],function(){

        Route::post("create_product_rate/{id}", [UserRatingController::class, "store"]);
    
    });
       

        // SliderimagesController.Api

            Route::post("create_slider_image", [SliderimagesController::class, "store"]);
            Route::post("update_slider_image/{id}", [SliderimagesController::class, "update"]);
            Route::delete("delete_slider_image/{id}", [SliderimagesController::class, "destroy"]);
            Route::get("list_slider_images", [SliderimagesController::class, "index"]);
        
        // FavoriteController.Api

     
Route::middleware('auth:api')->post("store_favorite_products/{id}", [FavoriteController::class, "store"]);
Route::middleware('auth:api')->get("list_favorite_products", [FavoriteController::class, "index"]);


   //FatoorahController.Api


   Route::get('payment', [\App\Http\Controllers\MyFatoorahController::class, 'index']);
//    Route::get('payment/callback', [\App\Http\Controllers\MyFatoorahController::class, 'callback']);
//    Route::get('payment/error', [\App\Http\Controllers\MyFatoorahController::class, 'error']);


    //CartsController.Api


Route::group(["middleware"=> ["auth:api"]],function(){

    Route::post("create_cart", [CartsController::class, "store"]);
    Route::delete("delete_cart/{id}", [CartsController::class, "destroy"]);

});
Route::get("single_cart/{id}", [CartsController::class, "show"]);


//CartsController.Api


Route::group(["middleware"=> ["auth:api"]],function(){

    Route::post("create_cart_products", [CartProductController::class, "store"]);
    Route::delete("delete_cart_products/{id}", [CartProductController::class, "destroy"]);

});
Route::get("list_cart_products", [CartProductController::class, "index"]);
