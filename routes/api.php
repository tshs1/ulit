<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SectionController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/users')->group(function(){
    route::get('/teachers', [UsersController::class, 'teachers']);
    route::get('/students', [UsersController::class, 'students']);
    route::get('/', [UsersController::class, 'index']);
    route::get('/list', [UsersController::class, 'test']);
    route::put('/{user}/update', [UsersController::class, 'update']);
    route::post('/save', [UsersController::class, 'save']);
    route::delete('/{user}/destroy', [UsersController::class, 'destroy']);
});

Route::prefix('/roles')->group(function(){
    route::get('/', [RolesController::class, 'index']);
    route::get('/list', [RolesController::class, 'list']);
    route::put('/{roles}/update', [RolesController::class, 'update']);
    route::post('/save', [RolesController::class, 'save']);
    route::delete('/{roles}/destroy', [RolesController::class, 'destroy']);
});
Route::prefix('/sections')->group(function(){
    route::get('/list', [SectionController::class, 'list']);
    route::get('/', [SectionController::class, 'index']);
    route::get('/list', [SectionController::class, 'list']);
    route::put('/{section}/update', [SectionController::class, 'update']);
    route::post('/save', [SectionController::class, 'save']);
    route::delete('/{section}/destroy', [SectionController::class, 'destroy']);
});
