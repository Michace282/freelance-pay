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
        $withdrawals = Withdrawal::orderBy('created_at','DESC')->paginate(25);
    } else {
        // Если обычный пользователь (клиент или исполнитель), показываем только его сделки
        $transactions = Transaction::where(function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->orderBy('created_at','DESC')->paginate(10); // Пагинация по 10 записей на странице
        $withdrawals = Withdrawal::where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->paginate(25);
    }
    return view('transactions.account', compact('transactions','withdrawals'));
}


public function payments()
{
    return view('transactions.payments');
}


public function store(Request $request)
{

    // Получаем текущего пользователя
    $user = auth()->user();


    if ($request->has('transactionId') && $request->filled('transactionId')) {
        //$transaction = Transaction::find($request->get('transactionId'))->update(['status'=>'Проверка оплаты']);
        echo json_encode(['success' => true]);
    } else {
            // Валидация формы
        $validated = $request->validate([
            'requisites' => 'required|string|max:255',
            'transaction_amount' => 'required',
            'method' => 'nullable|string|max:255',
            'fio' => 'nullable|string|max:255',
        ]);

         $transaction_amount = (float)$validated['transaction_amount']; // Основная сумма
$percentage = 2;  // Процент (можно менять)
$fixed_fee = 50;  // Фиксированная сумма (можно менять)

// Расчет итоговой суммы
$total_amount = $transaction_amount * (1 + $percentage / 100) + $fixed_fee;

       // Создаем сделку
        $transaction = Transaction::create([
            'requisites' => $validated['requisites'],
            'method' => $validated['method'],
            'fio' => $validated['fio'],
            'user_id' => $user->id,
            'status' => 'В обработке',
            'transaction_amount' => $total_amount - (float)$validated['transaction_amount'],
        ]);

        $curl = curl_init();

       


$payment = [
 "merchant_id" => env('NICEPAY_MERCHANT_ID'),
 "secret" => env('NICEPAY_SECRET'),
 "order_id" => $transaction->id,
 "customer" =>  $user->email,
 "amount" => $transaction_amount * 100,
 "currency" => "RUB",
 "description" => "Пополнение баланса пользователя freelance-z.ru - {$user->login}",
 "success_url" => route('transaction.accept', $transaction->id),
 "fail_url" => route('transaction.error', $transaction->id),
];

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://nicepay.io/public/api/payment',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($payment),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
),
));

$response = json_decode(curl_exec($curl));

curl_close($curl);
if ($response->status == 'success') {
   Transaction::find($transaction->id)->update(['status'=>'Проверка оплаты', 'link' => $response->data->link,'payment_id' => $response->data->payment_id]);
   echo json_encode(['status' => $response->status, 'id' => $transaction->id, 'link' => $response->data->link]); 
} else {
    echo json_encode(['status' => $response->status, 'id' => $transaction->id, 'message' => $response->data->message]);
}

}

    // Redirect to the deals index page with a success message
    //return redirect()->route('account')->with('success', 'Транзакция успешно создана!');
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
     if ($transaction->status !== 'Успешно') {
        $transaction->status = 'Успешно'; // Пример статуса
        $transaction->save();
        $user = User::find($transaction->user_id); 
        $transaction->status = 'Успешно'; // Пример статуса
        $transaction->save();
        $user = User::find($transaction->user_id); 
        if ($transaction->transaction_amount >= $user->sum_transfer)
           $user->is_blocked = 0;
       $user->balance += $transaction->transaction_amount;
       $user->save();
   }
   return redirect()->route('home');
}

public function errorTransaction($transactionId)
{
    $transaction = Transaction::findOrFail($transactionId);
        $transaction->status = 'Отмена'; // Пример статуса
        $transaction->save();
        return redirect()->route('account');
    }


    public function handlerTransaction(Request $request)
    {
        $params = $_GET;
$secretKey = env('NICEPAY_SECRET'); //  Секретный ключ мерчанта

$hash = $params['hash'];
unset($params['hash']); // Удаляем из данных строку подписи
ksort($params, SORT_STRING); // Сортируем по ключам в алфавитном порядке элементы массива

array_push($params, $secretKey); // Добавляем в конец массива ключ
$hash_string = implode('{np}', $params); // Конкатенируем значения через символ "{np}"
$hash_sha256 = hash('sha256', $hash_string);

if ($hash != $hash_sha256) {
    echo json_encode(array('error' => array('message' => 'Invalid hash')));
    exit;
}

switch ($params['result']) {
    case "success":
    $payment_id = $params['payment_id'];

    $transaction = Transaction::where('payment_id', $payment_id)->first();

    if ($transaction->status !== 'Успешно') {
         $transaction->status = 'Успешно'; // Пример статуса
         $transaction->save();

         $user = User::find($transaction->user_id); 

         if ($transaction->transaction_amount >= $user->sum_transfer)
           $user->is_blocked = 0;
       $user->balance += $transaction->transaction_amount;
       $user->save();
   }

   echo json_encode(array('result' => array('message' => 'Success')));
   exit;
   break;
   case "error":
   $payment_id = $params['payment_id'];

   $transaction = Transaction::where('payment_id', $payment_id)->first();
        $transaction->status = 'Ошибка'; // Пример статуса
        $transaction->save();

        echo json_encode(array('error' => array('message' => 'Error')));
        exit;
        break;
        default:
        $payment_id = $params['payment_id'];

        $transaction = Transaction::where('payment_id', $payment_id)->first();
        $transaction->status = 'Отмена'; // Пример статуса
        $transaction->save();
        echo json_encode(array('error' => array('message' => 'Empty')));
        exit;
        break;
    }

}




}
