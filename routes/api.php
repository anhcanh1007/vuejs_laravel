<?php

use App\Http\Controllers\Api\AccountBankController;
use App\Http\Controllers\Api\BankController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('/transactions', TransactionController::class);
    Route::get('/get_transaction_by_id', [TransactionController::class, 'get_transaction_by_id']);
});




Route::apiResource('/payments', PaymentController::class);
Route::apiResource('/banks', BankController::class);
Route::apiResource('/account_banks', AccountBankController::class);
Route::get('/getbanks', [PaymentController::class, 'getBanks']);
Route::get('/getaccount/{id}', [AccountBankController::class, 'getAccountByBankId']);

Route::get('/transaction-new-request', [TransactionController::class, 'get_transaction_by_status']);

