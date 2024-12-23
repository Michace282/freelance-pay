@extends('layouts.app')

@section('content')
<section class = "head">
    <div class = "container-fluid">
        <div class = "row justify-content-center">
            <div class = "head__title col-4 col-md-2 col-xl-2">
                <h3 class = "text-center fc-main">Мои сделки</h3>
            </div>
        </div>
    </div>
</section>
<section class = "accountInfo">
    <div class = "container-fluid">
        <div class = "row">
            <div class = "accountInfo__title d-flex align-items-center position-relative">
                <h4 class = "fc-main">Новая сделка</h4>
            </div>
        </div>
    </div>
</section>
<section class="newDeal">
    <div class="container-fluid">
        <div class="row">
            <div class="newDealBlock d-flex justify-content-center align-items-center col-12">
                <form action="{{ route('deals.store') }}" method="POST" class="form__settings d-flex flex-column align-items-center">
                    @csrf
                    <div class="form__field fc-main d-flex flex-column flex-xl-row align-items-xl-center">
                        <label>Название сделки</label>
                        <input class="bc-block" type="text" name="deal_title" required placeholder="Введите текст..." value="{{ old('deal_title') }}">
                        @error('deal_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form__field fc-main d-flex flex-column flex-xl-row align-items-xl-center">
                        <label>Ваша роль</label>
                        <select class="fc-main bc-block" name="role" required onchange="changeRoleText(this)">
                            <option value="Заказчик" {{ old('role') == 'Заказчик' ? 'selected' : '' }}>Заказчик</option>
                            <option value="Исполнитель" {{ old('role') == 'Исполнитель' ? 'selected' : '' }}>Исполнитель</option>
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form__field fc-main d-flex flex-column flex-xl-row align-items-xl-center">
                        <label id="roleText">{{ old('role') == 'Исполнитель' ? 'Заказчик' : 'Исполнитель' }}</label>
                        <input id="roleField" class="bc-block" type="text" name="second_user" required placeholder="{{ old('role') == 'Исполнитель' ? 'Логин заказчика' : 'Логин исполнителя' }}" value="{{ old('second_user') }}">
                        @error('second_user')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form__field fc-main d-flex flex-column align-items-xl-center col-12">
                        <label class="align-self-start">Описание сделки</label>
                        <textarea name="deal_information" placeholder="Введите подробное описание сделки..." class="bc-block align-self-end col-11">{{ old('deal_information') }}</textarea>
                        @error('deal_information')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form__field fc-main d-flex flex-column flex-xl-row align-items-xl-center">
                        <label>Сумма сделки</label>
                        <input class="bc-block" type="number" name="sum" oninput="calcSums()" required placeholder="20.000 ₽" value="{{ old('sum') }}">
                        @error('sum')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="newDealBlock__commision fc-secondary d-flex flex-column align-items-center col-8 col-xl-6">
                        <div class="d-flex col-12">
                            <span class="col-9">Комиссия сделки</span>
                            <span class="col-3" id="taxsummm">0₽</span>
                             <input id="comission" type="hidden" name="comission"  required value="{{ old('comission') }}">
                        </div>
                        <div class="d-flex justify-content-between col-12">
                            <span class="col-9">Итоговая сумма сделки</span>
                            <span class="col-3" id="totalm">0₽</span>
                        </div>
                    </div>

                    <div class="form__field fc-main d-flex flex-column flex-xl-row align-items-xl-center">
                        <label>Срок на выполнение</label>
                        <input class="bc-block" type="text" name="days_count" required placeholder="15 дней" value="{{ old('days_count') }}">
                        @error('days_count')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row justify-content-center" style="margin-top: 20px">
                        <button class="form__btn bc-akcent border-right fc-white" type="submit">Создать сделку</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function calcSums() {
        let sumInput = document.getElementsByName("sum")[0];
        // document.getElementById('summm').innerHTML = Number(sumInput.value) + "₽";
        document.getElementById('taxsummm').innerHTML = ((Number(sumInput.value) / 100) * 5).toFixed(2) + "₽";
        document.getElementById('comission').value = ((Number(sumInput.value) / 100) * 5).toFixed(2);
        document.getElementById('totalm').innerHTML = ((Number(sumInput.value) / 100) * 5) + Number(sumInput.value) + "₽";
    }
</script>

<script>
    function changeRoleText(data) {
        let roleElement = document.getElementById('roleText');
        let roleField = document.getElementById('roleField');
        if (data.value === 'employer') {
            roleElement.innerText = 'Исполнитель';
            roleField.setAttribute("placeholder", "Логин исполнителя");
        } else if (data.value === 'performer') {
            roleElement.innerText = 'Заказчик';
            roleField.setAttribute("placeholder", "Логин заказчика");
        }
    }
</script>
@endsection