@extends('layouts.app')

@section('content')
<section class = "head">
    <div class = "container-fluid">
        <div class = "row justify-content-center">
            <div class = "head__title d-flex flex-column flex-xl-row align-items-center justify-content-center justify-content-xl-between col-12 col-md-12 col-xl-12">
                <div class = "d-flex justify-content-center justify-content-xl-end col-12 col-xl-7">
                    <h3 class = "text-center fc-main col-12">Мой счет <span>{{ auth()->user()->balance }}₽</span></h3>
                </div>
                <a href = "{{ route('payments') }}">
                    <div class="form__btn bc-akcent border-left text-center fc-white">Пополнить счет</div>
                </a>
            </div>
        </div>
    </div>
</section>
<section class = "accountWarnings">
    <div class = "container-fluid">
        <div class = "row">
            <div class = "accountWarnings__description d-flex justify-content-center col-12">
                <div class = "accountWarnings__description__txt fc-white bc-secondary border-right d-flex justify-content-center align-items-center col-6 col-md-5 col-xl-3">
                    <p class = "text-center">freelance-pay.com не является банком, платежной системой или иной финансовой организацией и не ведет расчетные счета пользователей.
                    Кабинет freelance-pay.com обеспечивает лишь удобство расчетов между Клиентами.</p>
                </div>
                <div class = "warningBlock__description__txt fc-white bc-secondary border-left d-flex justify-content-center align-items-center col-6 col-md-5 col-xl-3">
                    <p class = "text-center">Перевод осуществляется в течении 24ч.</p>
                </div>
            </div>
        </div>
        @if (auth()->user()->is_blocked)
        <div class="accountWarnings__alert fc-main">
            <h4 class="text-center">
                <nickname>{{ auth()->user()->login }}</nickname>
                , на данный момент, переводы и выводы для вашей учетной записи приостановлены.
                <span class="btn bc-red border-left"><a href="{{ route('messages') }}" class="fc-white">Подробнее</a></span>
            </h4>
        </div>
        @endif
    </div>
</section>
<section class = "accountHistory">
    <div class = "container-fluid">
        <div class = "row justify-content-center">
            <div class = "head__title d-flex justify-content-center align-items-center col-8 col-md-4 col-xl-3">
                <h3 class = "text-center fc-main">История</h3>
            </div>
        </div>
        <div class = "row justify-content-center ">
            <div class = "accountHistory__btn tab__title active__tab text-center fc-white col-md-3 col-xl-2" data-tab = "1">
                История пополнений
            </div>
            <div class = "accountHistory__btn tab__title text-center fc-white col-md-3 col-xl-2"  data-tab = "2">
                Выводы по реквизитам
            </div>
            <div class = "accountHistory__btn tab__title text-center fc-white col-md-3 col-xl-2"  data-tab = "3">
                Перевод пользователю
            </div>
        </div>
        <div class="row">
            <div class="tabs__content col-12 p-0 m-0">
                <div class="tab-content col-12" data-tab="1">
                  @foreach ($transactions as $transaction)                                                                                                      
                  <div class="accountHistory__table bc-block col-12 col-xl-10">
                    <div class="accountHistory__table__row col-12">
                        <div class="tableRow d-flex col-12">
                            <div class = "text-center col-1">
                                <div class="colTitle">ID</div>
                            </div>
                            <div class = "text-center col-2 col-xl-3">
                                <div class="colTitle">Дата</div>
                            </div>
                            <div class = "text-center col-2">
                                <div class="colTitle">Реквизиты</div>
                            </div>
                            <div class = "text-center col-3">
                                <div class="colTitle">Номер счета</div>
                            </div>
                            <div class = "text-center col-2 col-xl-1">
                                <div class="colTitle">Сумма</div>
                            </div>
                            <div class = "text-center col-2">
                                <div class="colTitle">Статус</div>
                            </div>
                        </div>
                        <div class="tableRow d-flex table__border fc-main col-12">
                            <div class = "colContent text-center col-1">
                                <div>{{ $transaction->id }}</div>
                            </div>
                            <div class = "colContent text-center col-2 col-xl-3">
                                <div>{{ $transaction->transaction_date }}</div>
                            </div>
                            <div class = "colContent text-center col-2">
                                <div>
                                 @if (($transaction->status == 'В обработке' || $transaction->status == 'Проверка оплаты' || $transaction->status == 'Отмена') && $transaction->link )
                                    <a target="_blank" href="{{ $transaction->link }}" class="fc-g">Ссылка</a>
                               @else 
                               {{ $transaction->requisites }}
                               @endif
                           </div>
                       </div>
                       <div class = "colContent text-center col-3">
                        <div>{{ $transaction->account_number }}</div>
                    </div>
                    <div class = "colContent text-center col-2 col-xl-1">
                        <div>{{ $transaction->transaction_amount }}₽</div>
                    </div>
                    <div class = "colContent text-center col-2">
                        <div class="fc-g">
                            {{ $transaction->status }}
                            @if ($transaction->status == 'В обработке')
                            <div class="modalButtons">
                                <button class="btn bc-secondary fc-white border-right trigger-button paid" onclick="paid({{ $transaction->id }});">Я оплатил(а)</button>
                            </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="tab-content col-12" data-tab="2">
        <div class="accountHistory__table bc-block col-12 col-xl-10">
            @if (!auth()->user()->is_blocked)
            <div class = "order bc-main d-flex justify-content-center justify-content-xl-start align-items-center col-12">
                <button class = "btn btn-order fc-white bc-akcent border-right">Создать перевод</button>
            </div>
            <div class = "orderBlock bc-main d-none col-12">
                <form action="{{ route('withdrawal.store') }}" method="POST" class="form__settings d-flex flex-column">
                    @csrf                                       <div class="form__field d-flex align-items-center">
                        <label class = "text-end fc-main">Платежная система</label>
                        <select class = "fc-main bc-block" name="requisites" required="">
                            <option>Сбербанк</option>
                            <option>ВТБ</option>
                            <option>Альфа-банк</option>
                            <option>РОСБАНК</option>
                            <option>Газпромбанк</option>
                            <option>Тинькофф Банк</option>
                            <option>МКБ</option>
                            <option>ЮMoney</option>
                            <option>Webmoney</option>
                            <option>Monero (XMR)</option>
                            <option>Bitcoin (BTC)</option>
                            <option>Ethereum (ETH)</option>
                        </select>
                    </div>
                    @error('requisites')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form__field d-flex align-items-center">
                        <label class = "text-end fc-main">Номер банковской карты / счета / кошелька</label>
                        <input type="text" name="account_number" required="" placeholder="Введите номер" class = "bc-block">
                        <button class="form__btn border-left fc-white bc-btn-g align-self-center d-none d-xl-block" data-toggle="modal"
                        data-target="#myModal">Отправить</button>
                    </div>
                    @error('account_number')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form__field d-flex align-items-center">
                        <label class = "text-end fc-main">Сумма</label>
                        <input type="text" name="amount" required="" placeholder="0.000 ₽" class = "bc-block">
                    </div>
                    @error('amount')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button class="form__btn border-left fc-white bc-btn-g align-self-center d-block d-xl-none" data-toggle="modal"
                    data-target="#myModal">Отправить</button>
                </form>
            </div>
            @endif
        </div>

        @foreach ($withdrawals as $withdrawal)                                                                                                      
        <div class="accountHistory__table bc-block col-12 col-xl-10">
            <div class="accountHistory__table__row col-12">
                <div class="tableRow d-flex col-12">
                    <div class = "text-center col-1">
                        <div class="colTitle">ID</div>
                    </div>
                    <div class = "text-center col-2 col-xl-3">
                        <div class="colTitle">Дата</div>
                    </div>
                    <div class = "text-center col-2">
                        <div class="colTitle">Реквизиты</div>
                    </div>
                    <div class = "text-center col-3">
                        <div class="colTitle">Номер счета</div>
                    </div>
                    <div class = "text-center col-2 col-xl-1">
                        <div class="colTitle">Сумма</div>
                    </div>
                    <div class = "text-center col-2">
                        <div class="colTitle">Статус</div>
                    </div>
                </div>
                <div class="tableRow d-flex table__border fc-main col-12">
                    <div class = "colContent text-center col-1">
                        <div>{{ $withdrawal->id }}</div>
                    </div>
                    <div class = "colContent text-center col-2 col-xl-3">
                        <div>{{ $withdrawal->created_at }}</div>
                    </div>
                    <div class = "colContent text-center col-2">
                        <div>
                         {{ $withdrawal->requisites }}
                     </div>
                 </div>
                 <div class = "colContent text-center col-3">
                    <div>{{ $withdrawal->account_number }}</div>
                </div>
                <div class = "colContent text-center col-2 col-xl-1">
                    <div>{{ $withdrawal->amount }}₽</div>
                </div>
                <div class = "colContent text-center col-2">
                    <div class="fc-g">
                        {{ $withdrawal->status }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="tab-content col-12" data-tab="3">
    @if (!auth()->user()->is_blocked)
    <div class = "sendBlock col-12 col-xl-8">
        <form action="{{ route('transaction.transfer') }}" method="POST" class="form__settings d-flex flex-column align-items-center align-items-xl-start">
            @csrf 
            <div class="form__field d-flex align-items-center">
                <label class = "text-end fc-main">Логин пользователя</label>
                <input type="text" name="login" required="true" placeholder="Введите логин" class = "bc-block">
            </div>
            <div class="form__field d-flex align-items-center">
                <label class = "text-end fc-main">Сумма</label>
                <input type="text" name="sum" required="true" placeholder="0.000 ₽" class = "bc-block">
                <button class="form__btn bc-btn-g fc-white border-left d-none d-xl-block">отправить</button>
            </div>
            <button class="form__btn bc-btn-g fc-white border-left d-block d-xl-none">отправить</button>
        </form>
    </div>
    @endif
</div>
</div>
</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" style="text-align: center">
            <h4 class="modal-title" id="myModalLabel" style="width: 100%;">Подтверждение создания
            перевода</h4>
        </div>
        <div class="modal-body" style="min-height: 80px;">
            <p>
                Перевод осуществляется в течении 24ч.<br>
                Вы уверены что хотите создать перевод?
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
            <button type="submit" class="btn btn-primary" onclick="makeOtput(this)">Подтвердить перевод
            </button>
        </div>
    </div>
</div>
</div>
</section>
@endsection