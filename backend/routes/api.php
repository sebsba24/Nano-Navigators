<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TopicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/roles', [RoleController::class, 'index']);
/* routes of user module */
Route::get('/user', [UserController::class, 'index']); 
Route::get('/user/findById/{id}', [UserController::class, 'showUserById']);
Route::post('/user/create', [UserController::class, 'store']);
// routes of course
Route::get('/course',[CourseController::class,'index']);
Route::get('/course/findByName/{name}',[CourseController:: class, 'showCourseByName']);
Route::post('/course/create',[CourseController::class,'store']);
Route::post('/course/update/{id}',[CourseController::class,'update']);
Route::post('/course/editState/{id}',[CourseController::class,'editStateCourse']);
// routes of topics
Route::get('/topic',[TopicController::class,'index']);
Route::get('/topic/findByName/{name}',[TopicController::class,'showTopicByName']); 
Route::post('/topic/create',[TopicController::class,'store']);
Route::post('/topic/update/{id}',[TopicController::class,'update']);