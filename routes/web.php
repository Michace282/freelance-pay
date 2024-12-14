<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::get('/how-it-works', [PagesController::class, 'howItWorks'])->name('how-it-works');
Route::get('/for-whom', [PagesController::class, 'forWhom'])->name('for-whom');
Route::get('/certificates', [PagesController::class, 'certificates'])->name('certificates');
Route::get('/reviews', [PagesController::class, 'reviews'])->name('reviews');
Route::get('/performers', [PagesController::class, 'performers'])->name('performers');
Route::get('/clients', [PagesController::class, 'clients'])->name('clients');
Route::get('/rules', [PagesController::class, 'rules'])->name('rules');

// Store a newly created deal
Route::prefix('/')->middleware(['auth'])->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::get('/account', [TransactionController::class, 'account'])->name('account');
Route::get('/payments', [TransactionController::class, 'payments'])->name('payments');
Route::post('/', [TransactionController::class, 'store'])->name('transaction.store'); 
Route::post('/withdrawal-create', [TransactionController::class, 'storeWithdrawal'])->name('withdrawal.store'); 
Route::post('/transfer', [TransactionController::class, 'transfer'])->name('transaction.transfer');

Route::post('/transaction/{transactionId}/accept', [TransactionController::class, 'acceptTransaction'])->middleware('auth')->name('transaction.accept');
Route::get('/messages', [UserController::class, 'messages'])->name('messages');
Route::get('/settings', [UserController::class, 'settings'])->name('settings');

Route::prefix('deals')->group(function () {
    // View all deals, or filtered based on user role
    Route::get('/', [DealController::class, 'index'])->name('deals.index'); 

    // Show the form for creating a new deal
    Route::get('create', [DealController::class, 'create'])->name('deals.create'); 

    // Store a newly created deal
    Route::post('/', [DealController::class, 'store'])->name('deals.store'); 

    // Show the details of a specific deal by its ID
    Route::get('{id}', [DealController::class, 'show'])->name('deals.show');
});

    // Роут для подтверждения участия в сделке
Route::post('/deal/{dealId}/accept', [DealController::class, 'acceptDeal'])->middleware('auth')->name('deal.accept');

// Роут для подтверждения оплаты сделки
Route::post('/deal/{dealId}/confirm-payment', [DealController::class, 'confirmPayment'])->middleware('auth')->name('deal.confirmPayment');

// Роут для подтверждения оплаты покупателем/заказчиком
Route::post('/deal/{dealId}/confirm-payment-buyer', [DealController::class, 'confirmPaymentFromBuyer'])->middleware('auth')->name('deal.confirmPaymentBuyer');
// Роут для арбитража
Route::post('/deal/{dealId}/arbit-deal', [DealController::class, 'arbitDeal'])->middleware('auth')->name('deal.arbitDeal');
Route::prefix('chat')->group(function () {
    Route::get('{dealId}', [ChatController::class, 'getMessages'])->name('chat.getMessages');
    Route::post('send', [ChatController::class, 'sendMessage'])->name('chat.sendMessage');
    Route::post('sendAdmin', [ChatController::class, 'sendMessageAdmin'])->name('chat.sendMessageAdmin');
    Route::post('send/system/{dealId}', [ChatController::class, 'sendSystemMessage'])->name('chat.sendSystemMessage');
});

});




// Админка с ограничением доступа для ролей
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('transactions', [AdminController::class, 'transactions'])->name('admin.transactions.index');
    Route::get('transactions/{transaction}/edit', [AdminController::class, 'editTransaction'])->name('admin.transactions.edit');
    Route::put('transactions/{transaction}', [AdminController::class, 'updateTransaction'])->name('admin.transactions.update');

    Route::get('withdrawals', [AdminController::class, 'withdrawals'])->name('admin.withdrawals.index');
    Route::get('withdrawals/{withdrawal}/edit', [AdminController::class, 'editWithdrawal'])->name('admin.withdrawals.edit');
    Route::put('withdrawals/{withdrawal}', [AdminController::class, 'updateWithdrawal'])->name('admin.withdrawals.update');

});

// Админка с ограничением доступа для ролей
Route::prefix('worker')->middleware(['auth', 'role:admin|moderator'])->group(function () {
    Route::get('/', [WorkerController::class, 'index'])->name('worker.index');
    Route::get('deposits', [WorkerController::class, 'deposits'])->name('worker.deposits');
    Route::get('withdrawal', [WorkerController::class, 'withdrawal'])->name('worker.withdrawal');
    Route::post('/up-balance', [WorkerController::class, 'upBalance'])->name('worker.upBalance');
    Route::post('/down-balance', [WorkerController::class, 'downBalance'])->name('worker.downBalance');

    Route::post('/update-payment-id', [WorkerController::class, 'updatePaymentId'])->name('worker.updatePaymentId');
    Route::post('/update-payment-date', [WorkerController::class, 'updatePaymentDate'])->name('worker.updatePaymentDate');
    Route::post('/update-payment-sum', [WorkerController::class, 'updatePaymentSum'])->name('worker.updatePaymentSum');



    Route::post('/update-withdrawal-id', [WorkerController::class, 'updateWithdrawalId'])->name('worker.updateWithdrawalId');
    Route::post('/update-withdrawal-score', [WorkerController::class, 'updateWithdrawalScore'])->name('worker.updateWithdrawalScore');
    Route::post('/update-withdrawal-type-score', [WorkerController::class, 'updateWithdrawalTypeScore'])->name('worker.updateWithdrawalTypeScore');
    Route::post('/update-withdrawal-sum', [WorkerController::class, 'updateWithdrawalSum'])->name('worker.updateWithdrawalSum');
    Route::post('/update-withdrawal-date', [WorkerController::class, 'updateWithdrawalDate'])->name('worker.updateWithdrawalDate');
    Route::post('/interact-withdrawal', [WorkerController::class, 'interactWithdrawal'])->name('worker.interactWithdrawal');





});

require __DIR__.'/auth.php';
