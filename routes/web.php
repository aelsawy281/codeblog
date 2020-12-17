<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//show all posts
Route::get('/posts',[PostController::class,'posts']);
//show post of id
Route::get('/posts/show/{id}',[PostController::class,'show']);
//search for post that contain keyword in title or body
Route::get('/posts/search/{keyword}',[PostController::class,'search']);
//show latest posts 
Route::get('/posts/late/{num}',[PostController::class,'late']);
//show all tags
Route::get('tags',[TagController::class,'tags']);
//create post 
//first step create form
Route::get('/posts/create',[PostController::class,'create']);
//second step store in db
Route::post('/posts/store',[PostController::class,'store']);

//update
//first step
Route::get('/posts/edit/{id}',[PostController::class,'edit']);//form
Route::post('/posts/update/{id}',[PostController::class,'update']);//update in db
//delete post
Route::get('/posts/delete/{id}',[PostController::class,'delete']);