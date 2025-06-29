<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TvTypeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('viewImage/type1', [TvTypeController::class, 'apiViewImageType1']);
Route::get('viewImage/type2', [TvTypeController::class, 'apiViewImageType2']);
Route::get('viewImage/type3', [TvTypeController::class, 'apiViewImageType3']);
