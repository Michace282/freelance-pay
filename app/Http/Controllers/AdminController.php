<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Support\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function transactions(Request $request)
    {
        $transactions_query = Transaction::orderBy('transaction_date','DESC');
// Поиск по логину пользователя через связанную модель
        if ($request->filled('login')) {
            $transactions_query->whereHas('user', function ($query) use ($request) {
                $query->where('login', $request->get('login'));
            });
        }

// Поиск по ФИО
        if ($request->filled('name')) {
            $transactions_query->where('fio', $request->get('name'));
        }

// Поиск по реквизитам
        if ($request->filled('requisites')) {
            $transactions_query->where('requisites', $request->get('requisites'));
        }

// Поиск по номеру счета
        if ($request->filled('account_number')) {
            $transactions_query->where('account_number', $request->get('account_number'));
        }

// Поиск по методу
        if ($request->filled('method')) {
            $transactions_query->where('method', $request->get('method'));
        }

// Поиск по дате создания
        if ($request->filled('created_at')) {
            try {
        // Конвертация строки в дату, поддержка формата `Y-m-d`
                $date = Carbon::parse($request->get('created_at'));
                $transactions_query->whereDate('transaction_date', '=', $date->format('Y-m-d'));
            } catch (\Exception $e) {
        // Игнорируем ошибку парсинга даты, если она некорректна
        // Или можно вернуть ошибку, например, используя abort(400, 'Invalid date');
            }
        }

        $transactions =$transactions_query->paginate(10);
        return view('admin.transactions.index', compact('transactions'));
    }

    public function editTransaction(Transaction $transaction)
    {
        return view('admin.transactions.edit', compact('transaction'));
    }

    public function updateTransaction(Request $request, Transaction $transaction)
    {
         // Валидация формы

       $validated = $request->validate([
        'requisites' => 'required|string|max:255',
        'account_number' => 'nullable|string|max:255',
        'transaction_amount' => 'required',
        'method' => 'nullable|string|max:255',
        'fio' => 'nullable|string|max:255',
        'status' => 'nullable|string|max:255',
    ]);

       if ($transaction->status !== $validated['status'] && $validated['status'] == 'Выполнено') {
        $u = User::find($transaction->user_id);
        $u->balance += $transaction->transaction_amount;
        $u->save();
       }

    // Получаем текущего пользователя
       $user = auth()->user();

    // Создаем сделку
       $transaction = $transaction->update([
        'requisites' => $validated['requisites'],
        'account_number' => $validated['account_number'],
        'method' => $validated['method'],
        'fio' => $validated['fio'],
        'status' =>  $validated['status'],
        'transaction_amount' => $validated['transaction_amount'],
    ]);


       return redirect()->route('admin.transactions.index')->with('success', 'Транзакция успешно обновлена');
   }

   public function withdrawals(Request $request)
   {
       $withdrawals_query = Withdrawal::orderBy('created_at','DESC');
// Поиск по логину пользователя через связанную модель
       if ($request->filled('login')) {
        $withdrawals_query->whereHas('user', function ($query) use ($request) {
            $query->where('login', $request->get('login'));
        });
    }

// Поиск по реквизитам
    if ($request->filled('requisites')) {
        $withdrawals_query->where('requisites', $request->get('requisites'));
    }

// Поиск по номеру счета
    if ($request->filled('account_number')) {
        $withdrawals_query->where('account_number', $request->get('account_number'));
    }


// Поиск по дате создания
    if ($request->filled('created_at')) {
        try {
        // Конвертация строки в дату, поддержка формата `Y-m-d`
            $date = Carbon::parse($request->get('created_at'));
            $withdrawals_query->whereDate('created_at', '=', $date->format('Y-m-d'));
        } catch (\Exception $e) {
        // Игнорируем ошибку парсинга даты, если она некорректна
        // Или можно вернуть ошибку, например, используя abort(400, 'Invalid date');
        }
    }

    $withdrawals =$withdrawals_query->paginate(10);
    return view('admin.withdrawals.index', compact('withdrawals'));
}

public function editWithdrawal(Withdrawal $withdrawal)
{
    return view('admin.withdrawals.edit', compact('withdrawal'));
}


public function updateWithdrawal(Request $request, Withdrawal $withdrawal)
{
     // Валидация формы
    $validated = $request->validate([
        'requisites' => 'required|string|max:255',
        'amount' => 'required',
        'account_number' => 'required|string|max:255',
        'status' => 'nullable|string|max:255',
    ]);

    // Получаем текущего пользователя
    $user = auth()->user();

    // Создаем сделку
    $transaction = $withdrawal->update([
        'requisites' => $validated['requisites'],
        'account_number' => $validated['account_number'],
        'amount' => $validated['amount'],
        'status' =>  $validated['status'],
    ]);

    return redirect()->route('admin.withdrawals.index')->with('success', 'Вывод успешно обновлен');
}
}
