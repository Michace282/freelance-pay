@extends('adminlte::page')

@section('title', $withdrawal ?? 'Create Withdrawal')

@section('content')
<div class="container">
    <h1>{{ isset($withdrawal) ? 'Edit Withdrawal' : 'Create Withdrawal' }}</h1>
    <form action="{{ route('admin.withdrawals.update', $withdrawal) }}" method="POST">
        @csrf
        @if(isset($withdrawal))
        @method('PUT')
        @endif

        <div class="form-group">
            <label for="account_number">Account number</label>
            <input type="text" name="account_number" class="form-control" value="{{ $withdrawal->account_number ?? old('account_number') }}">
        </div>

        <div class="form-group">
            <label for="password">Requisites</label>
            <select name="requisites" class="form-control">
                <option {{ $withdrawal->requisites == 'ВТБ' ? 'selected' : '' }} value="ВТБ">ВТБ</option>
                <option {{ $withdrawal->requisites == 'Альфа-банк' ? 'selected' : '' }} value="Альфа-банк">Альфа-банк</option>
                <option {{ $withdrawal->requisites == 'РОСБАНК' ? 'selected' : '' }} value="РОСБАНК">РОСБАНК</option>
                <option {{ $withdrawal->requisites == 'Газпромбанк' ? 'selected' : '' }} value="Газпромбанк">Газпромбанк</option>
                <option {{ $withdrawal->requisites == 'Тинькофф Банк' ? 'selected' : '' }} value="Тинькофф Банк">Тинькофф Банк</option>
                <option {{ $withdrawal->requisites == 'МКБ' ? 'selected' : '' }} value="МКБ">МКБ</option>
                <option {{ $withdrawal->requisites == 'ЮMoney' ? 'selected' : '' }} value="ЮMoney">ЮMoney</option>
                <option {{ $withdrawal->requisites == 'Webmoney' ? 'selected' : '' }} value="Webmoney">Webmoney</option>
                <option {{ $withdrawal->requisites == 'Monero (XMR)' ? 'selected' : '' }} value="Monero (XMR)">Monero (XMR)</option>
                <option {{ $withdrawal->requisites == 'Bitcoin (BTC)' ? 'selected' : '' }} value="Bitcoin (BTC)">Bitcoin (BTC)</option>
                <option {{ $withdrawal->requisites == 'Ethereum (ETH)' ? 'selected' : '' }} value="Ethereum (ETH)">Ethereum (ETH)</option>
                
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" class="form-control" value="{{ $withdrawal->amount ?? old('amount') }}">
        </div>

        <label for="status">Status</label>
        <select  name="status" class="form-control">
            <option {{ $withdrawal->status == 'В обработке' ? 'selected' : '' }} value="В обработке">В обработке</option>
            <option {{ $withdrawal->status == 'Успешно' ? 'selected' : '' }} value="Успешно">Успешно</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">{{ isset($withdrawal) ? 'Update' : 'Create' }}</button>
</form>
</div>
@endsection