<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/{pathMatch}', function() {
    return view('welcome');
})->where('pathMatch',".*");


Route::get('/notify', [AdminController::class, 'notify']);
Route::get('/deposit', [AdminController::class, 'deposit']);
Route::get('/test', function () {
    $result = Transaction::count('status', 1);
    dd($result);
});
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'notifi']);
    Route::get('/show-deposit/{id}', [AdminController::class, 'show_info_deposit'])->name('show-deposit');
    Route::get('/change-deposit/{id}', [AdminController::class, 'change_status_deposit_success'])->name('change-status-deposit-done');
    Route::get('/list-transaction', [TransactionController::class, 'index']);
});
