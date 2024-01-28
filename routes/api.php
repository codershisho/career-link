<?php

use App\Http\Controllers\Api\AssessmentApi;
use App\Http\Controllers\Api\DocApi;
use App\Http\Controllers\Api\PhaseApi;
use App\Http\Controllers\Api\ReasonApi;
use App\Http\Controllers\Api\RecruitApi;
use App\Http\Controllers\Api\ResultApi;
use App\Http\Controllers\Api\ScheduleApi;
use App\Http\Controllers\Api\UserApi;
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

Route::prefix('/career-link')->group(function () {
    Route::prefix('/recruits')->group(function () {
        Route::get('/', [RecruitApi::class, 'search']);
        // 応募者毎
        Route::prefix('/{id}')->group(function () {
            Route::get('/', [RecruitApi::class, 'show']);
            // スケジュール情報
            Route::prefix('/schedules')->group(function () {
                Route::get('/', [ScheduleApi::class, 'search']);
                Route::post('/', [ScheduleApi::class, 'store']);
            });
            // 結果情報
            Route::prefix('/results')->group(function () {
                Route::get('/', [ResultApi::class, 'search']);
                Route::post('/users', [ResultApi::class, 'storeUsers']);
                Route::post('/users/result', [ResultApi::class, 'storeResultPhaseUser']);
                Route::get('/phases', [ResultApi::class, 'searchPhaseResults']);
                Route::post('/phases', [ResultApi::class, 'storePhaseResult']);
            });
            // ドキュメント
            Route::prefix('/docs')->group(function () {
                Route::get('/', [DocApi::class, 'search']);
                Route::post('/upload', [DocApi::class, 'upload']);
            });
        });
    });
    Route::prefix('/ms')->group(function () {
        Route::prefix('/phases')->group(function () {
            Route::get('/', [PhaseApi::class, 'index']);
            Route::get('/{id}', [PhaseApi::class, 'show']);
        });
        Route::prefix('/users')->group(function () {
            Route::get('/', [UserApi::class, 'index']);
            Route::get('/{id}', [UserApi::class, 'show']);
        });
        Route::prefix('/assessments')->group(function () {
            Route::get('/', [AssessmentApi::class, 'index']);
            Route::get('/{id}', [AssessmentApi::class, 'show']);
        });
        Route::prefix('/reasons')->group(function () {
            Route::get('/', [ReasonApi::class, 'index']);
            Route::get('/{id}', [ReasonApi::class, 'show']);
            Route::post('/', [ReasonApi::class, 'upsert']);
        });
    });
});
