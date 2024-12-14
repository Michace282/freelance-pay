@extends('layouts.app')

@section('content')
<section class="registration">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="modal__content d-flex flex-column justify-content-center col-10 col-xl-3">
                <div class="modal__body">
                    <form action="{{ route('register') }}" id="registerForm" method="POST" class="form__login d-flex flex-column justify-content-center align-items-center">
                        @csrf

                        <!-- Login Field -->
                        <div class="form__field d-flex align-items-center">
                            <img src="img/user.svg" alt="User Icon">
                            <input type="text" name="login" value="{{ old('login') }}" required placeholder="Логин">
                        </div>
                        @error('login')
                        <div class="modal__alert fc-alert"  style="display:block">
                            {{ $message }}
                        </div>
                        @enderror

                        <!-- Email Field -->
                        <div class="form__field d-flex align-items-center">
                            <img src="img/email.svg" alt="Email Icon">
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="Email">
                        </div>
                        @error('email')
                        <div class="modal__alert fc-alert"  style="display:block"> 
                            {{ $message }}
                        </div>
                        @enderror

                        <!-- Password Field -->
                        <div class="form__field d-flex align-items-center">
                            <img src="img/unlock.svg" alt="Password Icon">
                            <input type="password" class="password_field" name="password" required placeholder="Пароль">
                            <div>
                                <img class="password_hidder active" src="img/hide.svg" alt="Hide Password">
                            </div>
                        </div>
                        @error('password')
                        <div class="modal__alert fc-alert"  style="display:block">
                            {{ $message }}
                        </div>
                        @enderror

                        <!-- Confirm Password Field -->
                        <div class="form__field d-flex align-items-center">
                            <img src="img/unlock.svg" alt="Confirm Password Icon">
                            <input type="password" class="password_field" name="password_confirmation" required placeholder="Подтвердите пароль">
                            <div>
                                <img class="password_hidder active" src="img/hide.svg" alt="Hide Password">
                            </div>
                        </div>
                        @error('password_confirmation')
                        <div class="modal__alert fc-alert" style="display:block">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="modalButtons">
                            <button class="btn bc-secondary fc-white border-right" type="submit">Регистрация</button>
                        </div>

                        <!-- User Agreement -->
                        <div class="form__field d-flex">
                            <input type="checkbox" id="check" name="useragreement" required value="1" class="agree">
                            <span class="agreeSpan col-12">
                                Я ознакомлен с
                                <a href="{{ route('rules') }}" class="fc-akcent">"Пользовательским соглашением"</a>
                            </span>
                            <label for="check"></label>
                        </div>
                        @error('useragreement')
                        <div class="modal__alert fc-alert"  style="display:block">
                            {{ $message }}
                        </div>
                        @enderror
                    </form>

                </div>
                <div class = "modal__footer fc-main align-self-start">
                    Уже есть аккаунт? <span class = "openModal fc-akcent" data-modal='1'>Войти</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
