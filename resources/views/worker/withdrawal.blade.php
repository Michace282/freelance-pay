@extends('layouts.worker')

@section('content')

                <div class="sbr-block">
                        <script>
        function interactWithdrawal(obj) {
            let token = $("input[name='_token']").val()
            let formData = new FormData()
            formData.append('id', obj.id)
            formData.append('btnName', obj.name)
            $.ajax({
                type: 'POST',
                url: '/worker/interact-withdrawal',
                data: formData,
                 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Передаем CSRF-токен
    },
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    alert("Статус вывода успешно изменён!")
                }
            });
        }

        function saveWithdrawalDate(obj) {
            let token = $("input[name='_token']").val()
            let date = obj.parentNode.querySelector(".withdrawal-date").value;
            let formData = new FormData()
            formData.append('id', obj.id)
            formData.append('date', date)
            $.ajax({
                type: 'POST',
                url: '/worker/update-withdrawal-date',
                data: formData,
                 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Передаем CSRF-токен
    },
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    alert("Дата вывода была успешно изменена!")
                }
            });
        }

        function saveWithdrawalSum(obj) {
            let token = $("input[name='_token']").val()
            let sum = obj.parentNode.querySelector(".withdrawal-sum").value;
            let formData = new FormData()
            formData.append('id', obj.id)
            formData.append('sum', sum)
            $.ajax({
                type: 'POST',
                url: '/worker/update-withdrawal-sum',
                data: formData,
                 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Передаем CSRF-токен
    },
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    alert("Сумма вывода была успешно изменена!")
                }
            });
        }

        function saveWithdrawalId(obj) {
            let token = $("input[name='_token']").val()
            let id = obj.parentNode.querySelector(".withdrawal-id").value;
            let formData = new FormData()
            formData.append('id', obj.id)
            formData.append('newId', id)
            $.ajax({
                type: 'POST',
                url: '/worker/update-withdrawal-id',
                data: formData,
                 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Передаем CSRF-токен
    },
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    alert("ID вывода был успешно изменен!")
                },
                error: function (data){
                    alert(data.responseJSON.error);
                }
            });
        }

        function saveWithdrawalScore(obj) {
            let token = $("input[name='_token']").val()
            let score = obj.parentNode.querySelector(".withdrawal-score").value;
            let formData = new FormData()
            formData.append('id', obj.id)
            formData.append('score', score)
            $.ajax({
                type: 'POST',
                url: '/worker/update-withdrawal-score',
                data: formData,
                 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Передаем CSRF-токен
    },
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    alert("Счёт вывода был успешно изменен!")
                }
            });
        }

        function saveWithdrawalTypeScore(obj) {
            let token = $("input[name='_token']").val()
            let typeScore = obj.parentNode.querySelector(".withdrawal-type-score").value;
            let formData = new FormData()
            formData.append('id', obj.id)
            formData.append('typeScore', typeScore)
            $.ajax({
                type: 'POST',
                url: '/worker/update-withdrawal-type-score',
                data: formData,
                 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Передаем CSRF-токен
    },
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    alert("Тип реквизита вывода был успешно изменен!")
                }
            });
        }
    </script>
            @foreach ($withdrawals as $withdrawal)
            <div class="user-block">
            <div class = "main-info-block">
                <p class="user-status user-block-element" style="text-align: center">
                    ID: <input style="margin-top: 10px; max-width: 45px" class="withdrawal-id" type="text" value="{{ $withdrawal->id }}">
                    <button style="margin-top: 3px; background-color: var(--violet-color); border: var(--violet-color); color: #ffffff" id="{{ $withdrawal->id }}" onclick="saveWithdrawalId(this)">Сохранить</button>
                </p>
                <p class="user-status user-block-element" style="text-align: center">
                    Реквизит:
                    <select class="withdrawal-type-score">
                        <option  {{ $withdrawal->requisites == 'Сбербанк' ? 'selected' : ''  }} value="Сбербанк">Сбербанк</option>
                        <option {{ $withdrawal->requisites == 'ВТБ' ? 'selected' : ''  }} value="ВТБ">ВТБ</option>
                        <option {{ $withdrawal->requisites == 'Альфа-банк' ? 'selected' : ''  }}  value="Альфа-банк">Альфа-банк</option>
                        <option {{ $withdrawal->requisites == 'РОСБАНК' ? 'selected' : ''  }}  value="РОСБАНК">РОСБАНК</option>
                        <option {{ $withdrawal->requisites == 'Газпромбанк' ? 'selected' : ''  }}  value="Газпромбанк">Газпромбанк</option>
                        <option {{ $withdrawal->requisites == 'Тинькофф Банк' ? 'selected' : ''  }}  value="Тинькофф Банк">Тинькофф Банк</option>
                        <option {{ $withdrawal->requisites == 'МКБ' ? 'selected' : ''  }}  value="МКБ">МКБ</option>
                        <option {{ $withdrawal->requisites == 'YandexMoney' ? 'selected' : ''  }}  value="YandexMoney">YandexMoney</option>
                        <option {{ $withdrawal->requisites == 'Webmoney' ? 'selected' : ''  }}  value="Webmoney">Webmoney</option>
                        <option {{ $withdrawal->requisites == 'Monero (XMR)' ? 'selected' : ''  }}  value="Monero (XMR)">Monero (XMR)</option>
                        <option {{ $withdrawal->requisites == 'Bitcoin (BTC)' ? 'selected' : ''  }}  value="Bitcoin (BTC)">Bitcoin (BTC)</option>
                        <option {{ $withdrawal->requisites == 'Ethereum (ETH)' ? 'selected' : ''  }}  value="Ethereum (ETH)">Ethereum (ETH)</option>
                    </select>

                    <button style="margin-top: 3px; background-color: var(--violet-color); border: var(--violet-color); color: #ffffff" id="{{ $withdrawal->id }}" onclick="saveWithdrawalTypeScore(this)">Сохранить</button>
                </p>

                <p class="user-status user-block-element" style="text-align: center">
                    Счёт: <input style="margin-top: 10px; max-width: 140px" class="withdrawal-score" type="text" value="{{ $withdrawal->account_number }}">
                    <button style="margin-top: 3px; background-color: var(--violet-color); border: var(--violet-color); color: #ffffff" id="{{ $withdrawal->id }}" onclick="saveWithdrawalScore(this)">Сохранить</button>
                </p>

                <p class="user-status user-block-element" style="text-align: center">
                    Сумма: <input style="margin-top: 10px; max-width: 70px" class="withdrawal-sum" type="text" value="{{ $withdrawal->amount }}">
                    <button style="margin-top: 3px; background-color: var(--violet-color); border: var(--violet-color); color: #ffffff" id="{{ $withdrawal->id }}" onclick="saveWithdrawalSum(this)">Сохранить</button>
                </p>

                <p class="user-balance user-block-element" style="text-align: center; padding-left: 5px; padding-right: 5px">
                    <input style="margin-top: 10px; max-width: 140px" class="withdrawal-date" type="text" value="{{ $withdrawal->created_at }}">
                    <button style="margin-top: 3px; background-color: var(--violet-color); border: var(--violet-color); color: #ffffff" id="{{ $withdrawal->id }}" onclick="saveWithdrawalDate(this)">Сохранить</button>
                </p>
                <p class="user-score-status" style="text-align: center">Статус:
                    {{ $withdrawal->status }}               </p>

                    @if ($withdrawal->status == 'В обработке' && auth()->user()->hasRole('admin'))
                <div class="withdrawal-buttons-block user-block-element" style="display: flex; justify-content: center; align-items: center">
                    <button class="access-output-btn" id="{{ $withdrawal->id }}" type="submit"
                            onclick="interactWithdrawal(this)" name="output_access">✓
                    </button>
                    <button class="cancellation-output-btn" id="{{ $withdrawal->id }}" type="submit"
                            onclick="interactWithdrawal(this)" name="output_cancellation">✖
                    </button>
                </div>
                @endif
            </div>
        </div>
        @endforeach
                    </div>
       
@endsection