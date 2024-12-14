<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdrawal;


class TransactionController extends Controller
{
    public function account()
    {
        $user = auth()->user();

    // Проверяем роль пользователя с помощью Spatie
        if ($user->hasRole('admin') || $user->hasRole('moderator')) {
        // Если пользователь админ или модератор, показываем все сделки
        $transactions = Transaction::orderBy('transaction_date','DESC')->paginate(10); // Пагинация по 10 записей на странице
    } else {
        // Если обычный пользователь (клиент или исполнитель), показываем только его сделки
        $transactions = Transaction::where(function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->orderBy('created_at','DESC')->paginate(10); // Пагинация по 10 записей на странице
    }
    return view('transactions.account', compact('transactions'));
}


public function payments()
{
    return view('transactions.payments');
}


public function store(Request $request)
{
        // Валидация формы
    $validated = $request->validate([
        'requisites' => 'required|string|max:255',
        'transaction_amount' => 'required',
        'method' => 'nullable|string|max:255',
        'fio' => 'nullable|string|max:255',
    ]);

    // Получаем текущего пользователя
    $user = auth()->user();

    // Создаем сделку
    $transaction = Transaction::create([
        'requisites' => $validated['requisites'],
        'method' => $validated['method'],
        'fio' => $validated['fio'],
        'user_id' => $user->id,
        'status' => 'Проверка оплаты',
        'transaction_amount' => $validated['transaction_amount'],
    ]);

    // Redirect to the deals index page with a success message
    return redirect()->route('account')->with('success', 'Транзакция успешно создана!');
}

public function storeWithdrawal(Request $request)
{
        // Валидация формы
    $validated = $request->validate([
        'requisites' => 'required|string|max:255',
        'amount' => 'required',
        'account_number' => 'nullable|string|max:255',
    ]);

    // Получаем текущего пользователя
    $user = auth()->user();

    // Создаем сделку
    $transaction = Withdrawal::create([
        'requisites' => $validated['requisites'],
        'account_number' => $validated['account_number'],
        'amount' => $validated['amount'],
        'user_id' => $user->id,
        'status' => 'В обработке',
    ]);

    // Redirect to the deals index page with a success message
    return redirect()->route('account')->with('success', 'Вывод успешно создан!');
}

public function transfer(Request $request)
{
    // Получаем текущего пользователя
    $user = auth()->user();
    $userSecond = User::where(['login' => $request->get('login')]);

    if ($userSecond->exists()) {
        $userSecond->update(['balance' => $userSecond->first()->balance + $request->get('sum')]);
        $user->update(['balance' => $user->balance - $request->get('sum')]);
        // Redirect to the deals index page with a success message
         return redirect()->route('account')->with('success', 'Перевод успешно осуществлен!');
    } else {
         return redirect()->route('account')->with('error', 'Пользователя такого не найдено!');
    }
    
}

public function acceptTransaction($transactionId)
{
    $transaction = Transaction::findOrFail($transactionId);
        $transaction->status = 'Успешно'; // Пример статуса
        $transaction->save();
        return Redirect::route('account');
    }

}
