<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/config-clear', function() {
    Artisan::call('cache:clear');
    return 'Config cache has been cleared';
});


Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'Config cache has been cleared';
});
Route::get('/optimize', function() {
    Artisan::call('optimize:clear');
    return 'Config cache has been cleared';
});
Route::get('/route-clear', function() {
    Artisan::call('route:clear');
    return 'Config cache has been cleared';
});
Route::get('/updateapp', function()
{
    exec('composer dump-autoload');
    echo 'composer dump-autoload complete';
});

Route::get('tete',function (){
    return view('contract2.index2');
});

Route::get('/',  [App\Http\Controllers\HomeController::class,'index'])->name('dashboard');
Route::group(['prefix' => 'dashboard',
                'middleware' => 'auth'], function () {

    Route::get('/',  [App\Http\Controllers\HomeController::class,'index'])->name('dashboard');

    //==============================users_admin============================
    Route::resource('users_admin', 'App\Http\Controllers\UserController');

    //==============================user_supervisor============================
    Route::resource('user_supervisor', 'App\Http\Controllers\UserSupervisorController');

    //==============================user_supervisor============================
    Route::resource('user_customers', 'App\Http\Controllers\UserCustomersController');

    //==============================projects============================
    Route::resource('projects', 'App\Http\Controllers\ProjectsController');

    //==============================sections============================
    Route::resource('sections', 'App\Http\Controllers\SectionsController');

    //==============================special_conditions============================
    Route::resource('special_conditions', 'App\Http\Controllers\Special_conditionsController');
    Route::get('answers/index/{id}', 'App\Http\Controllers\AnswersController@index');
    Route::post('answers/store', 'App\Http\Controllers\AnswersController@store')->name('answers.store');
    Route::patch('answers/update', 'App\Http\Controllers\AnswersController@update')->name('answers.update');
    Route::delete('answers/destroy', 'App\Http\Controllers\AnswersController@destroy')->name('answers.destroy');

    //==============================special_conditions============================

    Route::resource('contracts', 'App\Http\Controllers\ContractsController');

        Route::get('contracts/add_price/{id}', 'App\Http\Controllers\ContractsController@add_price');

            Route::patch('contracts/add_price/updatePrice', 'App\Http\Controllers\ContractsController@updatePrice');

    Route::patch('updatesupervisor', 'App\Http\Controllers\ContractsController@updatesupervisor');

  //  Route::post('updatesupervisor',[App\Http\Controllers\ContractsController::class,'updatesupervisor'])->name('updatesupervisor');


    Route::patch('Completion_project', 'App\Http\Controllers\ContractsController@Completion_project');
    Route::post('contracts/updateviewing', 'App\Http\Controllers\ContractsController@updateviewing')->name('updatecontracts');
    Route::get('contracts/view_images/{id}', 'App\Http\Controllers\ContractsController@view_images');

    Route::get('clearance_cases', 'App\Http\Controllers\ContractsController@clearance_cases');
    Route::post('clearance_cases/updateviewing', 'App\Http\Controllers\ContractsController@updateviewingclearance')->name('updateclearance_cases');
    Route::patch('updatestatusclearance', 'App\Http\Controllers\ContractsController@updateStatusClearance');


    //==============================special_conditions============================
    Route::get('answers_special_conditions/{id}',[App\Http\Controllers\Answers_special_conditionsController::class,'index']);



    //==============================work============================
    Route::resource('invoices', 'App\Http\Controllers\InvoicesController');
    Route::post('invoices/updateviewing', 'App\Http\Controllers\InvoicesController@updateviewing')->name('update');
    Route::patch('updatestatusinvoices', 'App\Http\Controllers\InvoicesController@updateStatus');


    //==============================work============================
    Route::resource('work', 'App\Http\Controllers\WorkController');
    Route::post('work/updateviewing', 'App\Http\Controllers\WorkController@updateviewing')->name('updatework');
    Route::patch('updatestatuswork', 'App\Http\Controllers\WorkController@updateStatus');
    Route::get('view_images/{id}', 'App\Http\Controllers\WorkController@view_images');

    //==============================schedule_of_work============================
    Route::resource('schedule_of_work', 'App\Http\Controllers\Schedule_of_workController');
    Route::post('schedule_of_work/updateviewing', 'App\Http\Controllers\Schedule_of_workController@updateviewing')->name('updateSchedule_of_workController');
//    Route::patch('updateStatusschedule_of_work', 'App\Http\Controllers\Schedule_of_workController@updateStatus');

    //==============================bond============================
    Route::resource('bond', 'App\Http\Controllers\BondController');
    Route::post('bond/updateviewing', 'App\Http\Controllers\BondController@updateviewing')->name('updatebond');

    //==============================connect_us============================
    Route::resource('connect_us', 'App\Http\Controllers\Connect_usController');
    Route::post('connect_us/updateviewing', 'App\Http\Controllers\Connect_usController@updateviewing')->name('updateconnect_us');


    //==============================settings============================
    Route::resource('settings', 'App\Http\Controllers\About_usController');
    Route::get('/products/create-pdf', [\App\Http\Controllers\About_usController::class, 'exportPDF']);

    //==============================notification============================
    Route::resource('notification', 'App\Http\Controllers\NotificationsController');
    Route::get('notifications/{id}',[App\Http\Controllers\NotificationsController::class,'index']);
    Route::post('notification/store/allUser',[App\Http\Controllers\NotificationsController::class,'storeAllUser']);



});

Route::get('mail/send', 'App\Http\Controllers\MailController@send');
Route::get('push', 'App\Http\Controllers\PusherController@push');


Auth::routes();
//['register' => false]
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
