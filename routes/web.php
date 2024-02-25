<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Account\DepositController;
use App\Http\Controllers\Account\StatementController;
use App\Http\Controllers\Account\WithdrawController;
use App\Http\Controllers\Account\TransferController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Account;

//---signing in & up route---
Route::get('/', function () { return view('auth.login'); })->name('login');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

//-----Home-route---
Route::get('/dashboard', function () {
    $email = Auth::user()->email;
    $user = User::where('email', $email)->first();

    // Calculate total credits
    $totalCredits = Account::where('user_id', $user->id)
                            ->where('type', 'Credit')
                            ->sum('amount');

    // Calculate total debits
    $totalDebits = Account::where('user_id', $user->id)
                            ->where('type', 'Debit')
                            ->sum('amount');

    // Calculate balance
    $balance = $totalCredits - $totalDebits;

    return view('dashboard')->with([
        'name' => $user->name,
        'email' => $user->email,
        'balance' => $balance,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


//--navigation route----
Route::middleware('auth')->group(function () {
    Route::get('/deposit', [DepositController::class, 'index'])->name('deposit.index');
    Route::get('/withdraw', [WithdrawController::class, 'index'])->name('withdraw.index');
    Route::get('/transfer', [TransferController::class, 'index'])->name('transfer.index');
    Route::get('/statement', [StatementController::class, 'getStatement'])->name('statement');
    Route::post('/logout', Logout::class)->name('logout');
});

//---account operational route-----
Route::post('/deposit', [DepositController::class, 'Deposit'])->name('deposit');
Route::post('/withdraw', [WithdrawController::class, 'withdraw'])->name('withdraw');
Route::post('/transfer', [TransferController::class, 'Transfer'])->name('transfer');

require __DIR__.'/auth.php';
