<?php

use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Vexel\NotabeneLib\Controllers\TransactionController;

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







Route::middleware('api')->prefix('api')->group(function (){
    Route::post('/validateTransfer', [TransactionController::class, 'validateTransfer'])->name('validateTransfer');
    Route::post('/fullyValidateTransfer', [TransactionController::class, 'fullyValidateTransfer'])->name('fullyValidateTransfer');
    Route::post('/registerAddress', [TransactionController::class, 'registerAddress'])->name('registerAddress');

    Route::resource('transaction',TransactionController::class)->only(['index', 'update']);

});
