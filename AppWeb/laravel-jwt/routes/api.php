<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;


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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

],
    function ($router) {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']);


        Route::post('/addUser', [AdminController::class, 'addUser']);
        Route::get('/showEtu', [AdminController::class, 'showEtu']);
        Route::post('/deleteEtu/{id}', [AdminController::class, 'deleteEtu']);
        Route::put('updateEtu/{id}',  [AdminController::class, 'updateEtu']);

        Route::get('/showPro', [AdminController::class, 'showPro']);
        Route::get('/getOneEtu/{id}', [AdminController::class, 'getOneEtu']);
        Route::post('/deletePro/{id}', [AdminController::class, 'deletePro']);
        Route::put('updatePro/{id}',  [AdminController::class, 'updatePro']);

        //********module************ */

    Route::post('showModule',  [AdminController::class, 'showMod']);
    Route::post('addModule',  [AdminController::class, 'addModule']);
    Route::put('updateModule/{id}',  [AdminController::class, 'updateModule']);
    Route::post('deleteModule/{id}',  [AdminController::class, 'deleteModule']);



    //*****notes***** */

    Route::post('addNote',  [AdminController::class, 'addNote']);
    Route::put('updateNote/{id}',  [AdminController::class, 'updateNote']);
    Route::post('deleteNote/{id}',  [AdminController::class, 'deleteNote']);


});

