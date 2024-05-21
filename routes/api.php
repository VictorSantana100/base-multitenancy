<?php

use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Company\CompanyManagementController;
use App\Http\Controllers\Api\Supplier\SupplierController;
use App\Http\Controllers\Api\Product\ProductController;
use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\Equipament\EquipamentController;
use App\Http\Controllers\Api\Type\TypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Profile\ProfileController;

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


Route::get('company-collaborator', [CompanyManagementController::class, 'collaborators']);
Route::get('company-supplier/{company_uuid}', [CompanyManagementController::class, 'suppliers']);

Route::resource('company', CompanyController::class);
Route::resource('user', UserController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('product', ProductController::class);
Route::resource('type', TypeController::class);
Route::resource('category', CategoryController::class);
Route::resource('equipament', EquipamentController::class);
Route::resource('profile', ProfileController::class);
