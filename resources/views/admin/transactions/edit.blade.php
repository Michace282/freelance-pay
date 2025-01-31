@extends('adminlte::page')

@section('title', $withdrawal ?? 'Create Transaction')

@section('content')
<div class="container">
    <h1>{{ isset($transaction) ? 'Edit Transaction' : 'Create Transaction' }}</h1>
    <form action="{{ route('admin.transactions.update', $transaction) }}" method="POST">
        @csrf
        @if(isset($transaction))
        @method('PUT')
        @endif

        <div class="form-group">
            <label for="requisites">Requisites</label>
            <input type="text" name="requisites" class="form-control" value="{{ $transaction->requisites ?? old('requisites') }}">
        </div>

        <div class="form-group">
            <label for="account_number">Account number</label>
            <input type="text" name="account_number" class="form-control" value="{{ $transaction->account_number ?? old('account_number') }}">
        </div>

        <div class="form-group">
            <label for="password">Method</label>
            <select name="method" class="form-control">
                <option {{ $transaction->method == 'Сбербанк' ? 'selected' : '' }} value="Сбербанк">Сбербанк</option>
                <option {{ $transaction->method == 'Тинькофф' ? 'selected' : '' }} value="Тинькофф">Тинькофф</option>
                <option {{ $transaction->method == 'Visa/MC' ? 'selected' : '' }} value="Visa/MC">Visa/MC</option>
                <option {{ $transaction->method == 'ВТБ' ? 'selected' : '' }} value="ВТБ">ВТБ</option>
                <option {{ $transaction->method == 'Альфа Банк' ? 'selected' : '' }} value="Альфа Банк">Альфа Банк</option>
                <option {{ $transaction->method == 'РосБанк' ? 'selected' : '' }} value="РосБанк">РосБанк</option>
                <option {{ $transaction->method == 'Газпромбанк' ? 'selected' : '' }} value="Газпромбанк">Газпромбанк</option>
                <option {{ $transaction->method == 'МИР' ? 'selected' : '' }} value="МИР">МИР</option>
                <option {{ $transaction->method == 'РНКБ' ? 'selected' : '' }} value="РНКБ">РНКБ</option>
            </select>
        </div>

        <div class="form-group">
            <label for="fio">Name</label>
            <input type="text" name="fio" class="form-control" value="{{ $transaction->fio ?? old('fio') }}">
        </div>

        <div class="form-group">
            <label for="transaction_amount">Amount</label>
            <input type="text" name="transaction_amount" class="form-control" value="{{ $transaction->transaction_amount ?? old('transaction_amount') }}">
        </div>

        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option {{ $transaction->status == 'В обработке' ? 'selected' : '' }} value="В обработке">В обработке</option>
            <option {{ $transaction->status == 'Проверка оплаты' ? 'selected' : '' }} value="Проверка оплаты">Проверка оплаты</option>
            <option {{ $transaction->status == 'Успешно' ? 'selected' : '' }} value="Успешно">Успешно</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">{{ isset($transaction) ? 'Update' : 'Create' }}</button>
</form>
</div>
@endsection