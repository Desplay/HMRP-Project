<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LobbyController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\DoctorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix'=>'lobby', 'as'=>'lobby'], function () {
    Route::get('/', [
        LobbyController::class,
        'lobby'
    ]);
    Route::post('submit', [
        LobbyController::class,
        'addPatient'
    ]);
    Route::post('pop', [
        LobbyController::class,
        'popPatient'
    ]);
    Route::get('remove/{id}', [
        LobbyController::class,
        'removePatient',
    ]);
});

Route::group(['prefix' => 'edit-patient', 'as' => 'edit-patient'], function () {
    Route::get('/{id}', [
        LobbyController::class,
        'editPatient'
    ]);
    Route::post('submit', [
        LobbyController::class,
        'editPatientSubmit'
    ]);
});

Route::group(['prefix'=>'queue-room', 'as'=>'queue-room'], function () {
    Route::get('/', [
        QueueController::class,
        'queueRoom'
    ]);
    Route::post('move', [
        QueueController::class,
        'popPatient'
    ]);
    Route::get('remove/{id}', [
        QueueController::class,
        'removePatient',
    ]);
});

Route::group(['prefix' => 'doctor-room', 'as' => 'doctor-room'], function () {
    Route::get('/{id}', [
        DoctorController::class,
        'doctorRoom'
    ]);
    Route::post('/{id}/done', [
        DoctorController::class,
        'popPatient'
    ]);
    Route::get('remove/{doctor_id}/{any}', [
        DoctorController::class,
        'removePatient',
    ]);
});