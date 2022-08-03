<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth\UserSignInController;
use App\Http\Controllers\UserAuth\UserLoginController;
use App\Http\Controllers\Forms\FormGetController;
use App\Http\Controllers\Forms\FormPostController;
use App\Http\Controllers\Forms\FormDeleteController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['firebase'])->group(function (){
    Route::post('/signin', UserSignInController::class);
    Route::post('/login', UserLoginController::class);
});

Route::group(['prefix' => 'forms', 'middleware' => ['auth:sanctum'] ], function () {
    Route::get('/', FormGetController::class);
    Route::post('/', FormPostController::class);
    Route::delete('/', FormDeleteController::class);
});