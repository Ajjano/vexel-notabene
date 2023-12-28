<?php

use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Vexel\NotabeneLib\Controllers\TransactionController;
use Vexel\NotabeneLib\Controllers\WebhookController;

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
    Route::post('/validate-transfer', [TransactionController::class, 'validateTransfer'])->name('validateTransfer');
    Route::post('/fully-validate-transfer', [TransactionController::class, 'fullyValidateTransfer'])->name('fullyValidateTransfer');
    Route::post('/register-address', [TransactionController::class, 'registerAddress'])->name('registerAddress');

    Route::get('/list-vasps', [TransactionController::class, 'listVasps'])->name('listVasps');
    Route::post('/generate-access-token', [TransactionController::class, 'generateAccessToken'])->name('generateAccessToken');

    Route::resource('transaction',TransactionController::class)->only(['index', 'update']);



    Route::post('/webhook/register/{vaspDID}', [WebhookController::class, 'registerWebhook'])->name('registerWebhook');
    Route::delete('/webhook/delete/{vaspDID}', [WebhookController::class, 'deleteWebhook'])->name('deleteWebhook');

});
