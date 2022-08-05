<?php

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth\UserSignInController;
use App\Http\Controllers\UserAuth\UserLoginController;
use App\Http\Controllers\Forms\GetFormSchemaController;
use App\Http\Controllers\Forms\GetAllFormSchemaController;
use App\Http\Controllers\Forms\PostFormController;
use App\Http\Controllers\Forms\DeleteFormController;
use App\Http\Controllers\Forms\PutFormController;
use App\Http\Controllers\LineBot\PostLineBotController;

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

Route::middleware(['firebase'])->group(function () {
    Route::post('/signin', UserSignInController::class);
    Route::post('/login', UserLoginController::class);
});

Route::group(['prefix' => 'forms', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/', GetFormSchemaController::class);
    Route::get('/{companyId}', GetAllFormSchemaController::class);
    Route::post('/', PostFormController::class);
    Route::delete('/', DeleteFormController::class);
    Route::put('/', PutFormController::class);
});

Route::group(['prefix' => 'line-bot'], function () {
    Route::post('/{company}/webhook', PostLineBotController::class);
});

// Route::get('/', function () {
//     // URL生成
//     $url = URL::temporarySignedRoute(
//         'unsubscribe', now()->addMinutes(30), ['user' => 1]
//     );
//     return response()->json(
//         ['URL' => $url],
//          Response::HTTP_OK
//      );
// });

// Route::post('/member/{user}/attend', function (Request $request) {

//     return response()->json(
//         ['status' => "login"],
//          Response::HTTP_OK
//      );

// })->name('unsubscribe')->middleware('signed');
