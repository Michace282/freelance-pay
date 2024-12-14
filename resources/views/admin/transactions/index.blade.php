@extends('adminlte::page')

@section('title', 'Transactions')

@section('content')
<div class="container">
    <h1>Transactions</h1>
    <form action="{{ route('admin.transactions.index') }}" method="GET" class="row">
        <div class="form-group col-2">
            <label for="login">Login</label>
            <input type="text" name="login" class="form-control" value="{{ request()->has('login') ? request()->get('login') : '' }}">
        </div>
        <div class="form-group col-2">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ request()->has('name') ? request()->get('name') : '' }}">
        </div>
        <div class="form-group col-2">
            <label for="requisites">Requisites</label>
            <input type="text" name="requisites" class="form-control" value="{{ request()->has('requisites') ? request()->get('requisites') : '' }}">
        </div>
        <div class="form-group col-2">
            <label for="account_number">Account Number</label>
            <input type="text" name="account_number" class="form-control" value="{{ request()->has('account_number') ? request()->get('account_number') : '' }}">
        </div>
        <div class="form-group col-2">
            <label for="method">Method</label>
            <select name="method" class="form-control">
                <option></option>
                <option {{ request()->has('method') && request()->method == 'Сбербанк' ? 'selected' : '' }} value="Сбербанк">Сбербанк</option>
                <option {{ request()->has('method') && request()->method == 'Тинькофф' ? 'selected' : '' }} value="Тинькофф">Тинькофф</option>
                <option {{ request()->has('method') && request()->method == 'Visa/MC' ? 'selected' : '' }} value="Visa/MC">Visa/MC</option>
                <option {{ request()->has('method') && request()->method == 'ВТБ' ? 'selected' : '' }} value="ВТБ">ВТБ</option>
                <option {{ request()->has('method') && request()->method == 'Альфа Банк' ? 'selected' : '' }} value="Альфа Банк">Альфа Банк</option>
                <option {{ request()->has('method') && request()->method == 'РосБанк' ? 'selected' : '' }} value="РосБанк">РосБанк</option>
                <option {{ request()->has('method') && request()->method == 'Газпромбанк' ? 'selected' : '' }} value="Газпромбанк">Газпромбанк</option>
                <option {{ request()->has('method') && request()->method == 'МИР' ? 'selected' : '' }} value="МИР">МИР</option>
                <option {{ request()->has('method') && request()->method == 'РНКБ' ? 'selected' : '' }} value="РНКБ">РНКБ</option>
            </select>
        </div>
        <div class="form-group col-2">
            <label for="created_at">Date</label>
            <input type="date" name="created_at" class="form-control" value="{{ request()->has('created_at') ? request()->get('created_at') : '' }}">
        </div>
        <a href="{{ route('admin.transactions.index') }}" class="btn btn-danger">Clear</a>
        <button type="submit" class="btn btn-success" style="margin-left: 25px;">Search</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Name</th>
                <th>Requisites</th>
                <th>Account number</th>
                <th>Method</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->user->login }}</td>
                <td>{{ $transaction->fio }}</td>
                <td>{{ $transaction->requisites }}</td>
                <td>{{ $transaction->account_number }}</td>
                <td>{{ $transaction->method }}</td>
                <td>{{ $transaction->transaction_amount }} Р.</td>
                <td>{{ $transaction->transaction_date }}</td>
                <td>{{ $transaction->status }}</td>
                <td>
                    <a href="{{ route('admin.transactions.edit', $transaction) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $transactions->links() }}
</div>
@endsection