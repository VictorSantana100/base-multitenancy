<?php

use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Company\CompanyManagementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 * Auth
 */

Route::post('/register', 'App\Http\Controllers\Api\Auth\RegisterController@store');
Route::post('/login', 'App\Http\Controllers\Api\Auth\AuthController@auth');
Route::post('/auth/logout', 'App\Http\Controllers\Api\Auth\AuthController@logout')->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function (){
    
});


Route::resource('company', CompanyController::class);
Route::get('company-collaborators', [CompanyManagementController::class, 'getCollaborators']);

Route::resource('user', UserController::class);
