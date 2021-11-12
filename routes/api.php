<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VehicleController;
use App\Http\Requests\VehicleRequest;
use App\Http\Resources\VehicleResource;

use App\Http\Controllers\PersonController;
use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonResource;

use App\Http\Controllers\InformController;
use App\Http\Resources\InformResource;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/vehicle', function (VehicleRequest $request) {
    return VehicleResource::single( VehicleController::store($request));
});

Route::post('/person', function (PersonRequest $request) {
    return PersonResource::single( PersonController::store($request));
});

Route::get('/inform', function () {
    return InformController::index();
});