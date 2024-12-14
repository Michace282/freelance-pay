@extends('layouts.worker')

@section('content')

                <div class="sbr-block">
                    @foreach ($transactions as $transaction)
                                <div class="user-block">
            <div class = "main-info-block">
                <div class="user-status user-block-element" style="text-align: center">
                    Пользователь: <span style="margin-top: 10px; max-width: 45px" class="payment-id" type="text">{{ $transaction->user->login }}</span>
                </div>
                <div class="user-status user-block-element" style="text-align: center">
                    Сумма: <span style="margin-top: 10px; max-width: 45px" class="payment-id" type="text">{{ $transaction->transaction_amount }}</span>
                </div>
                <div class="user-status user-block-element" style="text-align: center">
                    Дата: <span style="margin-top: 10px; max-width: 45px" class="payment-id" type="text">{{ $transaction->transaction_date }}</span>
                </div>
                <p class="user-score-status user-block-element" style="text-align: center">Статус: {{ $transaction->status }}</p>
            </div>
        </div>
        @endforeach
        {{ $transactions->links() }}
           </div>
      
        
@endsection