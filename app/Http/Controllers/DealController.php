<?php
namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;


class DealController extends Controller
{
 public function index()
 {
    $user = auth()->user();

    // Проверяем роль пользователя с помощью Spatie
    if ($user->hasRole('admin') || $user->hasRole('moderator')) {
        // Если пользователь админ или модератор, показываем все сделки
        $deals = Deal::paginate(10); // Пагинация по 10 записей на странице
    } else {
        // Если обычный пользователь (клиент или исполнитель), показываем только его сделки
        $deals = Deal::where(function ($query) use ($user) {
            $query->where('client_id', $user->id)
            ->orWhere('executor_id', $user->id);
        })->paginate(10); // Пагинация по 10 записей на странице
    }

    return view('deals.index', compact('deals'));
}

public function create()
{
    return view('deals.create');
}

public function store(Request $request)
{
        // Валидация формы
    $validated = $request->validate([
        'deal_title' => 'required|string|max:255',
        'role' => 'required|string|in:Исполнитель,Заказчик',
        'second_user' => 'required|string|exists:users,login', // Логин второго пользователя
        'deal_information' => 'nullable|string',
        'sum' => 'required|numeric',
        'days_count' => 'required|numeric', // Количество дней на выполнение
    ]);

    // Получаем текущего пользователя
    $user = auth()->user();

    // Определяем client_id и executor_id в зависимости от роли
    if ($validated['role'] === 'Исполнитель') {
        $client = User::where('login', $validated['second_user'])->firstOrFail();
        $executor = $user;
    } else {
        $executor = User::where('login', $validated['second_user'])->firstOrFail();
        $client = $user;
    }

    // Рассчитываем конечную дату с учетом days_count
    $deal_date = Carbon::now()->addDays($validated['days_count']);

    // Создаем сделку
    $deal = Deal::create([
        'deal_title' => $validated['deal_title'],
        'client_id' => $client->id,
        'executor_id' => $executor->id,
        'amount' => $validated['sum'],
        'description' => $validated['deal_information'],
        'status' => 'На согласовании',  // Пример значения, можно изменить
        'role' => $validated['role'],
        'deal_date' => $deal_date,
    ]);

    // Redirect to the deals index page with a success message
    return redirect()->route('deals.index')->with('success', 'Сделка успешно создана!');
}

/**
 * Показать информацию о сделке
 *
 * @param int $id
 * @return \Illuminate\View\View
 */
public function show($id)
{
    // Find the deal by ID
    $deal = Deal::findOrFail($id);

    if (auth()->user()->is_blocked) {
         redirect()->route('deals.index');
    }

    // Return the view and pass the deal data
    return view('deals.show', compact('deal'));
}

public function sendMessage(Request $request)
{
    $request->validate([
        'deal_id' => 'required|integer',
        'message' => 'required|string',
        'message_type' => 'required|in:system,user',
    ]);

    $chat = new Chat();
    $chat->deal_id = $request->deal_id;
    $chat->sender_id = auth()->id();
    $chat->message = $request->message;
    $chat->message_type = $request->message_type;
    $chat->save();

    return response()->json(['success' => true]);
}

public function sendSystemMessage($dealId, $message, $sender_id = 0)
{
    $chat = new Chat();
    $chat->deal_id = $dealId;
        $chat->sender_id = 1; // Идентификатор администратора системы (или можно использовать другое значение)
        $chat->message = $message;
        $chat->message_type = 'system';
        $chat->save();

        return response()->json(['success' => true]);
    }
    public function acceptDeal($dealId)
    {
        $deal = Deal::findOrFail($dealId);

    // Убедитесь, что текущий пользователь является исполнителем или клиентом
        if ($deal->executor_id == auth()->id() || $deal->client_id == auth()->id()) {
        // Сообщение о принятии участия
            $message = 'Второй участник подтвердил своё участие';
            $this->sendSystemMessage($dealId, $message);

        // Обновление статуса сделки
        $deal->status = 'Ожидание оплаты'; // Пример статуса
        $deal->save();

        return Redirect::route('deals.show', $dealId);
    }

    return response()->json(['error' => 'Вы не можете принять участие в этой сделке.'], 403);
}

public function confirmPayment($dealId)
{
    $deal = Deal::findOrFail($dealId);

    // Проверьте, является ли текущий пользователь заказчиком
    if ($deal->client_id == auth()->id() && $deal->status == 'Ожидание оплаты') {
        // Обновляем статус сделки на оплачено
        $deal->status = 'Оплачена';
        $deal->save();

        // Система уведомляет обо всей оплате
        $this->sendSystemMessage($dealId, 'Сделка оплачена, теперь вы должны исполнить свои обязательства в рамках этой суммы. Для передачи информации и общения ипользуйте данный чат.');

        // Увеличиваем баланс продавца/исполнителя
        /*$executor = User::find($deal->executor_id);
        $executor->balance += $deal->amount; // Перевод средств на счет исполнителя
        $executor->save();*/

        // Перевод средств на счет исполнителя
        $сlient = User::find($deal->client_id);
        $сlient->balance -= $deal->amount; // Перевод средств на счет
        $сlient->save();

        return Redirect::route('deals.show', $dealId);
    }

    return response()->json(['error' => 'Только заказчик может подтвердить оплату.'], 403);
}

public function confirmPaymentFromBuyer($dealId)
{
    $deal = Deal::findOrFail($dealId);

    if ($deal->client_id == auth()->id() && $deal->status == 'В работе') {
        // Измените статус на завершенную сделку
        $deal->status = 'Завершена';
        $deal->save();

        // Система сообщает о завершении сделки
        $this->sendSystemMessage($dealId, "Покупатель принял работу и подтвердил платёж. На счёт исполнителя поступила оплата в размере {$deal->amount} ₽");

        // Перевод средств на счет исполнителя
        $executor = User::find($deal->executor_id);
        $executor->balance += $deal->amount; // Перевод средств на счет
        $executor->save();

        return Redirect::route('deals.show', $dealId);
    }

    return response()->json(['error' => 'Оплата уже была подтверждена или вы не можете подтвердить эту оплату.'], 403);
}

public function arbitDeal($dealId)
{
    $deal = Deal::findOrFail($dealId);

    if ($deal->status == 'Оплачена') {
        // Измените статус на завершенную сделку
        $deal->status = 'Арбитраж';
        $deal->save();

        // Система сообщает о завершении сделки
        $this->sendSystemMessage($dealId, "Был вызван арбитраж. Опишите пожалуйста вашу проблему и сотрудники сервиса вам помогут");

        return Redirect::route('deals.show', $dealId);
    }

    return response()->json(['error' => 'Оплата уже была подтверждена или вы не можете подтвердить эту оплату.'], 403);
}

public function cancelArbitDeal($dealId)
{
    $deal = Deal::findOrFail($dealId);

    // Проверьте, является ли текущий пользователь заказчиком
    if ($deal->status == 'Арбитраж') {
        // Обновляем статус сделки на оплачено
        $deal->status = 'Оплачена';
        $deal->save();

        // Система уведомляет обо всей оплате
        $this->sendSystemMessage($dealId, 'Арбитраж отменен.');

        return Redirect::route('deals.show', $dealId);
    }

    return response()->json(['error' => 'Только заказчик может подтвердить оплату.'], 403);
}

public function finishArbitDealByExecutor($dealId)
{
    $deal = Deal::findOrFail($dealId);

    if ($deal->status == 'Арбитраж') {
        // Измените статус на завершенную сделку
        $deal->status = 'Завершена';
        $deal->save();

        // Система сообщает о завершении сделки
        $this->sendSystemMessage($dealId, "Сделка завершена в пользу исполнителя");

        // Перевод средств на счет исполнителя
        $executor = User::find($deal->executor_id);
        $executor->balance += $deal->amount; // Перевод средств на счет
        $executor->save();

        return Redirect::route('deals.show', $dealId);
    }

    return response()->json(['error' => 'Оплата уже была подтверждена или вы не можете подтвердить эту оплату.'], 403);
}


public function finishArbitDealByClient($dealId)
{
    $deal = Deal::findOrFail($dealId);

    if ($deal->status == 'Арбитраж') {
        // Измените статус на завершенную сделку
        $deal->status = 'Завершена';
        $deal->save();

        // Система сообщает о завершении сделки
        $this->sendSystemMessage($dealId, "Сделка завершена в пользу заказчика");

        // Перевод средств на счет исполнителя
                // Перевод средств на счет исполнителя
        $сlient = User::find($deal->client_id);
        $сlient->balance += $deal->amount; // Перевод средств на счет
        $сlient->save();

        return Redirect::route('deals.show', $dealId);
    }

    return response()->json(['error' => 'Оплата уже была подтверждена или вы не можете подтвердить эту оплату.'], 403);
}

}
