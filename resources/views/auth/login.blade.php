@extends('layouts.app')

@section('content')
<section class="registration">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="modal__content d-flex flex-column justify-content-center col-10 col-xl-3">
                    <div class="modal__body">
   <form action="{{ route('login') }}" id="loginForm" method="POST" class="form__login d-flex flex-column justify-content-center align-items-center">
    @csrf
    <!-- Login Field -->
    <div class="form__field d-flex align-items-center">
        <img src="img/user.svg" alt="User Icon">
        <input type="text" name="login" required placeholder="Логин" value="{{ old('login') }}">
    </div>
    
    <!-- Password Field -->
    <div class="form__field d-flex align-items-center">
        <img src="img/unlock.svg" alt="Unlock Icon">
        <input type="password" class="password_field" name="password" required placeholder="Пароль">
        <div>
            <img class="password_hidder active" src="img/hide.svg" alt="Toggle Password Visibility">
        </div>
    </div>

    <!-- Error Message -->
    @if ($errors->any())
        <div class="modal__alert fc-alert" style="display:block">
            {{ $errors->first() }}
        </div>
    @endif

     <div class="modalButtons">
                                <button class="btn bc-secondary fc-white border-right" type="submit">Войти</button>
                            </div>

</form>
 </div>
                    <div class = "modal__footer fc-main">
                        Нет учетной записи? <span class="fc-akcent openModal openModal" data-modal='2'>Зарегистрировать</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
