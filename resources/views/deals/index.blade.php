@extends('layouts.app')

@section('content')
<section class="head">
    <div class="container-fluid">
        <div class="row">
            <div class="head__title d-flex justify-content-center justify-content-xl-between align-items-center flex-wrap col-12 col-md-2 col-xl-7">
                @if (!auth()->user()->is_blocked)
                <a href="{{ route('deals.create') }}" class="d-flex order-2 order-xl-1">
                    <div class="form__btn border-right bc-akcent fc-white text-center d-block fc-white">Создать сделку</div>
                </a>
                @endif
                <h3 class="fc-main d-flex justify-content-center order-1 order-xl-2 col-12">Мои сделки</h3>
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
    </div>
</section>

<section class="accountDeal">
    <div class="container-fluid">
        <div class="row">
            <div class="accountHistory__table d-flex px-0 col-12">
                <table class="table__separate">
                    @foreach($deals as $deal)
                    <tr class="bc-block">
                        <td class="td-border td-border-left">
                            <div class="colTitle fc-secondary d-block d-xl-none">№</div>
                            <div class="colTitle fc-secondary d-none d-xl-block">Номер сделки</div>
                            <div class="fc-main">{{ $deal->id }}</div>
                        </td>
                        <td class="td-border">
                            <div class="colTitle fc-secondary d-block d-xl-none">Название</div>
                            <div class="colTitle fc-secondary d-none d-xl-block">Название сделки</div>
                            <div class="fc-main">{{ $deal->deal_title }}</div>
                        </td>
                        <td class="td-border">
                            <div class="colTitle fc-secondary">Сумма</div>
                            <div class="fc-main">{{ $deal->amount }}₽</div>
                        </td>
                        <td class="td-border">
                            <div class="colTitle fc-secondary">Статус</div>
                            @if ($deal->status == 'На согласовании')
                                    <div class="fc-sog status">
                                        {{ $deal->status }}
                                    </div>
                                    @endif
                                    
                                    @if ($deal->status == 'Ожидание оплаты')
                                    <div class="fc-lg status">
                                        {{ $deal->status }}
                                    </div>
                                    @endif

                                    @if ($deal->status == 'Оплачена')
                                    <div class="fc-g status">
                                        {{ $deal->status }}
                                    </div>
                                    @endif

                                    @if ($deal->status == 'Арбитраж')
                                    <div class = "fc-alert status">
                                        {{ $deal->status }}
                                    </div>
                                    @endif
                                    
                                    @if ($deal->status == 'Завершена')
                                    <div class="fc-lg status">
                                        {{ $deal->status }}
                                    </div>
                                    @endif
                        </td>
                        <td class="td-border td-border-right">
                            <a href="{{ route('deals.show', $deal->id) }}">
                                <div class="btn border-left bc-btn-lg fc-white">Подробнее</div>
                            </a>
                        </td>
                          </tr>
                          <tr class="spacing">
                         @if ($deal->status === 'На согласовании' && auth()->id() === $deal->executor_id)
 <td class = btn-bottom style="position: relative;bottom:unset; left: unset">
                                        <form method="POST" enctype="multipart/form-data"
                                              action="{{ route('deal.accept', ['dealId' => $deal->id]) }}">
                                            @csrf                                 
                                            <button class = "fc-white bc-btn-lg d-flex align-items-center justify-content-between">Принять участие
                                                <img src = "/img/check-btn.svg">
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                              
                             
                    @endforeach
                </table>
                
                <!-- Кнопки пагинации -->
                <div class="d-flex justify-content-center">
                    {{ $deals->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection