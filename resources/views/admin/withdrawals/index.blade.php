@extends('adminlte::page')

@section('title', 'Withdrawals')

@section('content')
<div class="container">
    <h1>Withdrawals</h1>
    <form action="{{ route('admin.withdrawals.index') }}" method="GET" class="row">
        <div class="form-group col-2">
            <label for="login">Login</label>
            <input type="text" name="login" class="form-control" value="{{ request()->has('login') ? request()->get('login') : '' }}">
        </div>
        <div class="form-group col-2">
            <label for="account_number">Account Number</label>
            <input type="text" name="account_number" class="form-control" value="{{ request()->has('account_number') ? request()->get('account_number') : '' }}">
        </div>
        <div class="form-group col-2">
            <label for="method">Requisites</label>
            <select name="requisites" class="form-control">
                <option></option>
                <option {{ request()->has('requisites') && request()->requisites == 'ВТБ' ? 'selected' : '' }} value="ВТБ">ВТБ</option>
                <option {{ request()->has('requisites') && request()->requisites == 'Альфа-банк' ? 'selected' : '' }} value="Альфа-банк">Альфа-банк</option>
                <option {{ request()->has('requisites') && request()->requisites == 'РОСБАНК' ? 'selected' : '' }} value="РОСБАНК">РОСБАНК</option>
                <option {{ request()->has('requisites') && request()->requisites == 'Газпромбанк' ? 'selected' : '' }} value="Газпромбанк">Газпромбанк</option>
                <option {{ request()->has('requisites') && request()->requisites == 'Тинькофф Банк' ? 'selected' : '' }} value="Тинькофф Банк">Тинькофф Банк</option>
                <option {{ request()->has('requisites') && request()->requisites == 'МКБ' ? 'selected' : '' }} value="МКБ">МКБ</option>
                <option {{ request()->has('requisites') && request()->requisites == 'ЮMoney' ? 'selected' : '' }} value="ЮMoney">ЮMoney</option>
                <option {{ request()->has('requisites') && request()->requisites == 'Webmoney' ? 'selected' : '' }} value="Webmoney">Webmoney</option>
                <option {{ request()->has('requisites') && request()->requisites == 'Monero (XMR)' ? 'selected' : '' }} value="Monero (XMR)">Monero (XMR)</option>
                <option {{ request()->has('requisites') && request()->requisites == 'Bitcoin (BTC)' ? 'selected' : '' }} value="Bitcoin (BTC)">Bitcoin (BTC)</option>
                <option {{ request()->has('requisites') && request()->requisites == 'Ethereum (ETH)' ? 'selected' : '' }} value="Ethereum (ETH)">Ethereum (ETH)</option>
            </select>
        </div>
        <div class="form-group col-2">
            <label for="created_at">Date</label>
            <input type="date" name="created_at" class="form-control" value="{{ request()->has('created_at') ? request()->get('created_at') : '' }}">
        </div>
        <a href="{{ route('admin.withdrawals.index') }}" style="display: flex;align-content: center;flex-wrap: wrap;" class="btn btn-danger">Clear</a>
        <button type="submit" class="btn btn-success" style="margin-left: 25px;">Search</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Requisites</th>
                <th>Account number</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($withdrawals as $withdrawal)
            <tr>
                <td>{{ $withdrawal->id }}</td>
                <td>{{ $withdrawal->user->login }}</td>
                <td>{{ $withdrawal->requisites }}</td>
                <td>{{ $withdrawal->account_number }}</td>
                <td>{{ $withdrawal->amount }} Р.</td>
                <td>{{ $withdrawal->created_at }}</td>
                <td>{{ $withdrawal->status }}</td>
                <td>
                    <a href="{{ route('admin.withdrawals.edit', $withdrawal) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $withdrawals->links() }}
</div>
@endsection