<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Middleware\isSupervisorMiddleware;
use App\Http\Middleware\isUserMiddleware;

use App\Http\Controllers\Api\EmailVerificationController;
use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\projectController;

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
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('forgot-password', [UserController::class, 'forgotPassword']);

//Route::get('posts', [PostController::class, 'index']);

Route::get('project',[App\Http\Controllers\API\ProjectController::class,'index']);

Route::get('sections/{id}',[App\Http\Controllers\API\SectionsController::class,'index']);
Route::get('special_conditions/{id}',[App\Http\Controllers\API\Special_conditionsController::class,'index']);

Route::post('connect_us/store',[App\Http\Controllers\API\Connect_usController::class,'store']);
Route::get('about_us',[App\Http\Controllers\API\About_usController::class,'index']);


// Route::post('users', [UserController::class, 'storeuser']);


Route::group(['middleware' => ['auth:api']],function (){

    Route::post('logout', [UserController::class, 'logout']);
    Route::post('reset-password', [UserController::class, 'resetPassword']);
    Route::post('user/update',[App\Http\Controllers\API\UserController::class,'editUser']);
    Route::get('user',[App\Http\Controllers\API\UserController::class,'index']);
    Route::post('contracts/search',[App\Http\Controllers\API\ContractsController::class,'search']);
    Route::post('contracts/searchAll',[App\Http\Controllers\API\ContractsController::class,'searchAll']);
    Route::post('invoices/search',[App\Http\Controllers\API\InvoicesController::class,'search']);
    Route::post('work/search',[App\Http\Controllers\API\WorkController::class,'search']);
    Route::post('schedule_of_work/search',[App\Http\Controllers\API\Schedule_of_workController::class,'search']);

    //user
    Route::middleware(isSupervisorMiddleware::class)->namespace('\App\Http\Controllers\Api')->group(function(){
        Route::post('work/store',[App\Http\Controllers\API\WorkController::class,'store']);
        Route::post('schedule_of_work/store',[App\Http\Controllers\API\Schedule_of_workController::class,'store']);
        Route::post('invoices/store',[App\Http\Controllers\API\InvoicesController::class,'store']);
        Route::get('supervisor',[App\Http\Controllers\API\SupervisorControlController::class,'index']);
        Route::get('dashboard',[App\Http\Controllers\API\SupervisorControlController::class,'indexCont']);
        Route::get('contract',[App\Http\Controllers\API\SupervisorControlController::class,'contract']);
        Route::post('bond/store',[App\Http\Controllers\API\BondController::class,'store']);

    });
//    Route::middleware(isUserMiddleware::class)->namespace('\App\Http\Controllers\Api')->group(function(){

    Route::group(['middleware' => ['isUserMiddleware']], function () {


        Route::get('contracts/show',[App\Http\Controllers\API\ContractsController::class,'show']);
        Route::post('contracts/store',[App\Http\Controllers\API\ContractsController::class,'store']);

        Route::get('contracts/status/{id}',[App\Http\Controllers\API\ContractsController::class,'contract_Status']);
        Route::post('contracts/status/{id}',[App\Http\Controllers\API\ContractsController::class,'StatusUpdate']);
        Route::get('contracts/final_clearance/{id}',[App\Http\Controllers\API\ContractsController::class,'finalcLearance']);
        Route::post('contracts/final_clearance/update/{id}',[App\Http\Controllers\API\ContractsController::class,'finalcLearanceUpdate']);

        Route::post('special_conditions/store',[App\Http\Controllers\API\Special_conditionsController::class,'store']);


        Route::get('notification/show',[App\Http\Controllers\API\NotificationController::class,'notification']);
        Route::post('notification/update',[App\Http\Controllers\API\NotificationController::class,'update']);

        //sup
        Route::get('contracts/showِAll',[App\Http\Controllers\API\ContractsController::class,'showِAll']);


        Route::get('invoices/show/{id}',[App\Http\Controllers\API\InvoicesController::class,'show']);


        Route::get('work/show/{id}',[App\Http\Controllers\API\WorkController::class,'show']);






    });



});







// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();


// });
