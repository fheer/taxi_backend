<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BloodTypeController;
use App\Http\Controllers\UserController;

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
/*
Route::get('/login', function (){
    return 'Login Page';
})->name('login');
*/
/************************************ Blood Type *****************/
//Route::group(['prefix' => 'BloodType', 'middleware' => 'api'], function () {
Route::group(['prefix' => 'BloodType'], function () {
    Route::get('/list', [BloodTypeController::class, 'list'])->name('BloodType.list');
    Route::get('/index', [BloodTypeController::class, 'index'])->name('BloodType.index');
    Route::post('/store', [BloodTypeController::class, 'store'])->name('BloodType.store');
    Route::put('/update', [BloodTypeController::class, 'update'])->name('BloodType.update');
    Route::post('/destroy', [BloodTypeController::class, 'destroy'])->name('BloodType.destroy');
    Route::get('/show', [BloodTypeController::class, 'show'])->name('BloodType.show');
});

//Route::group(['prefix' => 'Persona', 'middleware' => 'auth:api'], function () {
Route::group(['prefix' => 'User'], function () {
    Route::post('/login', [UserController::class, 'login'])->name('User.login');
    Route::get('/list', [UserController::class, 'list'])->name('User.list');
    Route::get('/index', [UserController::class, 'index'])->name('User.index');
    Route::post('/store', [UserController::class, 'store'])->name('User.store');
    Route::put('/update', [UserController::class, 'update'])->name('User.update');
    Route::post('/destroy', [UserController::class, 'destroy'])->name('User.destroy');
    Route::get('/show', [UserController::class, 'show'])->name('User.show');
});
