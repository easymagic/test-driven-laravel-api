<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('create-user',[\App\Http\Controllers\ApiCollectionController::class,'createUser']);
Route::get('get-user/{email}',[\App\Http\Controllers\ApiCollectionController::class,'getUser']);
Route::post('add-project',[\App\Http\Controllers\ApiCollectionController::class,'addProject']);
Route::get('get-projects',[\App\Http\Controllers\ApiCollectionController::class,'getProjects']);
Route::post('add-file',[\App\Http\Controllers\ApiCollectionController::class,'addFile']);
Route::get('get-file/{projectFile}',[\App\Http\Controllers\ApiCollectionController::class,'getFile']);
Route::get('get-file-nodes',[\App\Http\Controllers\ApiCollectionController::class,'getFileNodes']);
Route::post('add-file-image',[\App\Http\Controllers\ApiCollectionController::class,'addFileImage']);
Route::get('get-file-images/{projectFile}',[\App\Http\Controllers\ApiCollectionController::class,'getFileImages']);
Route::get('add-file-version/{projectFileName}',[\App\Http\Controllers\ApiCollectionController::class,'addFileVersion']);
Route::get('get-file-versions/{projectFile}',[\App\Http\Controllers\ApiCollectionController::class,'getFileVersions']);
Route::get('get-image-fills/{projectFileName}',[\App\Http\Controllers\ApiCollectionController::class,'getImageFills']);
Route::post('add-comment',[\App\Http\Controllers\ApiCollectionController::class,'addComment']);
Route::get('get-comments/{projectName}',[\App\Http\Controllers\ApiCollectionController::class,'getComments']);


Route::get('get-me/{email}',[\App\Http\Controllers\ApiCollectionController::class,'getMe']);
Route::post('get-users',[\App\Http\Controllers\ApiCollectionController::class,'getUsers']);


