<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdrawal;
use App\Models\KingsHistory;

class WorkerController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $transactions = KingsHistory::orderBy('created_at','DESC')->where('user_id', $user->id)->paginate(10);
        return view('worker.index', compact('transactions'));
    }

    public function deposits()
    {
        $transactions = Transaction::where('status','Выполнено')->orderBy('transaction_date','DESC')->paginate(10);
        return view('worker.deposits', compact('transactions'));
    }

    public function withdrawal()
    {
        $withdrawals = Withdrawal::orderBy('created_at','DESC')->paginate(10);
        return view('worker.withdrawal', compact('withdrawals'));
    }

    public function upBalance(Request $request)
    {
    // Получаем текущего пользователя
        $user = auth()->user();

        // Создаем сделку
        KingsHistory::create([
            'user_id' => $user->id,
            'status' => 'Выполнено',
            'amount' => $request->get('sum'),
        ]);

        $user->update(['balance' => $user->balance + $request->get('sum')]);
        echo json_encode(['success' => true]);
    }

    public function downBalance(Request $request)
    {
    // Получаем текущего пользователя
        $user = auth()->user();

        $user->update(['balance' => $user->balance - $request->get('sum')]);
        echo json_encode(['success' => true]);
    }

    public function updatePaymentId(Request $request)
    {
        // Создаем сделку
        KingsHistory::find($request->get('id'))->update(['id' => $request->get('newId')]);
        echo json_encode(['success' => true]);
    }

    public function updatePaymentDate(Request $request)
    {
        // Создаем сделку
        KingsHistory::find($request->get('id'))->update(['created_at' => $request->get('date')]);
        echo json_encode(['success' => true]);
    }

    public function updatePaymentSum(Request $request)
    {
        // Создаем сделку
        KingsHistory::find($request->get('id'))->update(['amount' => $request->get('sum')]);
        echo json_encode(['success' => true]);
    }

    public function updateWithdrawalId(Request $request)
    {
        // Создаем сделку
        Withdrawal::find($request->get('id'))->update(['id' => $request->get('newId')]);
        echo json_encode(['success' => true]);
    }

    public function updateWithdrawalScore(Request $request)
    {
        // Создаем сделку
        Withdrawal::find($request->get('id'))->update(['account_number' => $request->get('score')]);
        echo json_encode(['success' => true]);
    }


    public function updateWithdrawalTypeScore(Request $request)
    {
        // Создаем сделку
        Withdrawal::find($request->get('id'))->update(['requisites' => $request->get('typeScore')]);
        echo json_encode(['success' => true]);
    }

    public function updateWithdrawalSum(Request $request)
    {
        // Создаем сделку
        Withdrawal::find($request->get('id'))->update(['amount' => $request->get('sum')]);
        echo json_encode(['success' => true]);
    }


    public function updateWithdrawalDate(Request $request)
    {
        // Создаем сделку
        Withdrawal::find($request->get('id'))->update(['created_at' => $request->get('date')]);
        echo json_encode(['success' => true]);
    }

    public function interactWithdrawal(Request $request)
    {
        // Создаем сделку
        if ($request->get('btnName') == 'output_access') {
           $w = Withdrawal::find($request->get('id'));
           $u = User::find($w->user_id);
           $u->balance -= $w->amount;
           $u->save;
           $w->status = 'Успешно';
           $w->save;  
        }  
        else {
           Withdrawal::find($request->get('id'))->update(['status' => 'Ошибка']); 
        }
        echo json_encode(['success' => true]);
    }

}
