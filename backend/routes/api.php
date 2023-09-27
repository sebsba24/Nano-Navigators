<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\AssesmentController;
use App\Http\Controllers\ModuleController;
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

/* routes of rol module */
Route::get('/roles', [RoleController::class, 'index']);
Route::put('/roles/update/{id}', [RoleController::class, 'update']);
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
// routes of certificate
Route::get('/certificate',[CertificateController::class,'index']);
Route::get('/certificate/findByName/{name}',[CertificateController::class,'showCertificateByName']);
Route::post('/certificate/create',[CertificateController::class,'store']);
Route::get('/certificate/download',[CertificateController::class,'download']);
Route::put('/user/update/{id}', [UserController::class, 'update']);
Route::put('/user/setState/{id}', [UserController::class, 'editStateUser']);
/* Routes of assesment module */
Route::get('/assesments', [AssesmentController::class, 'index']);
Route::get('/assesments/findById/{id}', [AssesmentController::class, 'findById']);
Route::post('/assesments/create', [AssesmentController::class, 'store']);
Route::put('/assesments/update/{id}', [AssesmentController::class, 'update']);
/* Routes of grades module */
Route::get('/grades', [GradeController::class, 'index']);
Route::get('/grades/findById/{id}', [GradeController::class, 'findById']);
Route::post('/grades/create', [GradeController::class, 'store']);
Route::put('/grades/update/{id}', [GradeController::class, 'update']);
/* Routes of module controller */
Route::get('/modules', [ModuleController::class, 'index']);
Route::get('/modules/findById/{id}', [ModuleController::class, 'findById']);
Route::post('/modules/create', [ModuleController::class, 'store']);
Route::put('/modules/update/{id}', [ModuleController::class, 'update']);
