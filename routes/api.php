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
});

    Route::get('slider',[MainController::class,'slider']);
    Route::get('aboutus',[MainController::class,'aboutus']);
    Route::get('service_list',[MainController::class,'service_list']);
    Route::get('service_details/{id}',[MainController::class,'service_details']);
    Route::get('service_category_details',[MainController::class,'service_category_details']);
    Route::get('talk_to_us',[MainController::class,'talk_to_us']);
    Route::get('pricing',[MainController::class,'pricing']);
    Route::get('pricing_items',[MainController::class,'pricing_items']);
    Route::get('testimonial_details',[MainController::class,'testimonial_details']);
    Route::get('useful_links/{page_name}',[MainController::class,'useful_links']);