@extends('layouts.worker')

@section('content')

<div class="sbr-block">
    <script>
        function upBalance(obj) {
            let sum = document.getElementById("sum").value
            if (sum > 0) {
                let formData = new FormData()
                formData.append('sum', sum)
                $.ajax({
                    type: 'POST',
                    url: '/worker/up-balance',
                    data: formData,
                    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Передаем CSRF-токен
    },
                    cache: false,
                   contentType: false,
                processData: false,
    success: function (data) {
        alert(`Баланс успешно пополнен на ${sum} рублей!`)
    }
})
            }
        }
        function downBalance(obj) {
            let sum = document.getElementById("sum").value
            if (sum > 0) {
                let formData = new FormData()
                formData.append('sum', sum)
                $.ajax({
                    type: 'POST',
                    url: '/worker/down-balance',
                    data: formData,
                    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Передаем CSRF-токен
    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        alert(`${sum} рублей успешно списано с баланса!`)
                    }
                })
            }
        }

        function savePaymentDate(obj) {
            let token = $("input[name='_token']").val()
            let date = obj.parentNode.querySelector(".payment-date").value;
            let formData = new FormData()
            formData.append('id', obj.id)
            formData.append('date', date)
            $.ajax({
                type: 'POST',
                url: '/worker/update-payment-date',
                data: formData,
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Передаем CSRF-токен
    },
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    alert("Дата пополнения была успешно изменена!")
                }
            });
        }

        function savePaymentSum(obj) {
            let sum = obj.parentNode.querySelector(".payment-sum").value;
            let formData = new FormData()
            formData.append('id', obj.id)
            formData.append('sum', sum)
            $.ajax({
                type: 'POST',
                url: '/worker/update-payment-sum',
                data: formData,
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Передаем CSRF-токен
    },
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    alert("Сумма пополнения была успешно изменена!")
                }
            });
        }

        function savePaymentId(obj) {
            let token = $("input[name='_token']").val()
            let id = obj.parentNode.querySelector(".payment-id").value;
            let formData = new FormData()
            formData.append('id', obj.id)
            formData.append('newId', id)
            $.ajax({
                type: 'POST',
                url: '/worker/update-payment-id',
                data: formData,
headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Передаем CSRF-токен
    },
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    alert("ID пополнения был успешно изменен!")
                },
                error: function (data){
                    alert(data.responseJSON.error);
                }
            });
        }
    </script>
    <div class = "user-events-block">
        <div class = "user-events-settings-block">
            <input class = "payment_sum" id="sum" placeholder = "Сумма"><br>
            <button class = "balance-operation-btn up" onclick = "upBalance(this)">Пополнить баланс</button>
            <button class = "balance-operation-btn down" onclick = "downBalance(this)">Отнять от баланса</button>
        </div>
    </div>

    @foreach ($transactions as $transaction)
    <div class="user-block">
        <div class = "main-info-block">
            <div class="user-status user-block-element" style="text-align: center">
                ID: <input style="margin-top: 10px; max-width: 45px" class="payment-id" type="text" value="{{ $transaction->id }}">
                <button style="margin-top: 3px; background-color: var(--violet-color); border: var(--violet-color); color: #ffffff" id="{{ $transaction->id }}" onclick="savePaymentId(this)">Сохранить</button>
            </div>
            <div class="user-status user-block-element" style="text-align: center">
                Сумма: <input style="margin-top: 10px; max-width: 70px" class="payment-sum" type="text" value="{{ $transaction->amount }}">
                <button style="margin-top: 3px; background-color: var(--violet-color); border: var(--violet-color); color: #ffffff" id="{{ $transaction->id }}" onclick="savePaymentSum(this)">Сохранить</button>
            </div>
            <div class="user-balance user-block-element" style="text-align: center; padding-left: 5px; padding-right: 5px">
                Дата: <input style="margin-top: 10px; max-width: 140px" class="payment-date" type="text" value="{{ $transaction->created_at }}">
                <button style="margin-top: 3px; background-color: var(--violet-color); border: var(--violet-color); color: #ffffff" id="{{ $transaction->id }}" onclick="savePaymentDate(this)">Сохранить</button>
            </div>
            <p class="user-score-status user-block-element" style="text-align: center">
            Статус: {{ $transaction->status }}
        </p>
        </div>
    </div>
    @endforeach

     {{$transactions->links() }}

</div>

@endsection