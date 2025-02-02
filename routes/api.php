<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddBusController;
use App\Http\Controllers\BusOwnerController;
use App\Http\Controllers\CardPunchController;
use App\Http\Controllers\LoginAPIController;
use App\Http\Controllers\RegistrationApiController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\BusOwnerApiController;
use App\Http\Controllers\AdminApiController;
use App\Http\Controllers\LoginController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/Add-Bus-api', [AddBusController::class, 'BusRegisterSubmitApi']);
// Route::get('/view-bus-api', [BusOwnerController::class, 'viewBusApi'])->middleware('APIAuth');

Route::post('/card-punch', [CardPunchController::class, 'store']);

Route::get('/stations', [StationController::class, 'index']);
Route::post('/add-stations', [StationController::class, 'addStation']);

Route::post('/loginApi', [LoginAPIController::class, 'login']);
Route::post('/passenger-register', [RegistrationApiController::class, 'passengerRegister']);
Route::post('/bus-owner-register', [RegistrationApiController::class, 'busOwnerRegister']);
Route::post('/logout', [LoginAPIController::class, 'logout']);

Route::post('/add-bus', [BusOwnerApiController::class, 'AddBusSubmitApi']);
Route::get('/view-bus-api', [BusOwnerApiController::class, 'viewBusApi']);
Route::get('/route-list', [BusOwnerApiController::class, 'viewRouteApi']);
Route::delete('/delete-bus/{id}', [BusOwnerApiController::class, 'delete']);

Route::post('/add-route', [AdminApiController::class, 'AddRouteSubmitApi']);
Route::get('/passenger-list', [AdminApiController::class, 'PassengerList']);
Route::post('/assign-rfid', [AdminApiController::class, 'AssignRfid']);


// Route::post('/password-forget', [LoginAPIControllers::class, 'sendResetLink']);

Route::post('/password/forget', [LoginController::class, 'sendResetLink'])->name('forget-password-link');
