<?php

use App\Http\Controllers\Api\RecruitApi;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sample', function (Request $request) {
    return response()->json(['msg' => '成功']);
});


Route::prefix('/recruits')->group(function () {
    Route::get('/', [RecruitApi::class, 'search']);
    Route::get('/{id}', [RecruitApi::class, 'show']);
});
