<?php

use App\Http\Controllers\Api\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('products', ProductController::class);
    Route::get('slider',[MainController::class,'slider']);
    Route::get('aboutus',[MainController::class,'aboutus']);
    Route::get('team',[MainController::class,'team']);
    Route::get('gallery',[MainController::class,'gallery']);
    Route::get('contact',[MainController::class,'contact']);
    Route::get('general_settings',[MainController::class,'general_settings']);
    Route::get('service_list',[MainController::class,'service_list']);
    Route::get('service_details/{id}',[MainController::class,'service_details']);
    Route::get('portfolio_list',[MainController::class,'portfolio_list']);
    Route::get('portfolio_details/{id}',[MainController::class,'portfolio_details']);
    Route::get('blog_list',[MainController::class,'blog_list']);
    Route::get('blog_details/{id}',[MainController::class,'blog_details']); 
    Route::post('message_submit',[MainController::class,'message_submit']); 
    Route::post('newsletter_submit',[MainController::class,'newsletter_submit']); 

});