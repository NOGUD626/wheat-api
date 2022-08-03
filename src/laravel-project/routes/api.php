<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth\UserSignInController;
use App\Http\Controllers\UserAuth\UserLoginController;

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

Route::group(['prefix' => 'user', 'middleware' => ['auth:sanctum'] ], function () {
    Route::get('/', function (Request $request) {
        return $request->user();
    });
});

Route::middleware(['firebase'])->group(function (){
    Route::post('/signin', UserSignInController::class);
    Route::post('/login', UserLoginController::class);
});