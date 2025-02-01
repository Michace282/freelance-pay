@extends('layouts.app')

@section('content')
<section class = "head">
    <div class = "container-fluid">
        <div class = "row justify-content-center">
            <div class = "head__title d-flex justify-content-center align-items-center col-12">
                <h3 class = "text-center fc-main">Настройки</h3>
            </div>
        </div>
    </div>
</section>
<section class = "settings">
    <div class = "container-fluid">
        <div class = "row">
            <div class = "settingsBlock d-flex justify-content-center align-items-center col-12">
              <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="form__settings d-flex flex-column align-items-center">
                @csrf
                @method('patch')

                <div class="settingBlock__photo d-flex flex-column align-items-center">
                    <div class="settingBlock__photo__img">
                        <img id="user_profile_image_preview" 
                        src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'img/DefaultUserImage.jpg' }}" 
                        alt="User Avatar">
                    </div>
                    <div class="settingBlock__photo__upload">
                        <label for="photo__upload" class="fc-secondary text-center">Сменить фото</label>
                        <input type="file" name="avatar" id="photo__upload" accept="image/*">
                    </div>
                </div>

                <div class="form__field d-flex align-items-center">
                    <label class="text-end fc-main">Имя пользователя</label>
                    <input type="text" name="login" readonly autocomplete="off" value="{{ old('login', $user->login) }}" class="bc-block" required>
                </div>

                <div class="form__field d-flex align-items-center">
                    <label class="text-end fc-main">Email</label>
                    <input type="email" name="email" readonly autocomplete="off" value="{{ old('email', $user->email) }}" class="bc-block" required>
                </div>

                <div class="form__field d-flex align-items-center">
                    <label class="text-end fc-main">Специализация</label>
                    <input type="text" name="specialization" value="{{ old('specialization', $user->specialization ?? '') }}" class="bc-block" placeholder="Специализация">
                </div>

                <div class="form__field d-flex align-items-center">
                    <label class="text-end fc-main">Пароль</label>
                    <input type="password" name="password" class="password_field" placeholder="Пароль">
                    <div>
                        <img src="img/hide.svg" class="password_hidder active hide__img">
                    </div>
                </div>

                <button class="form__btn border-left fc-white bc-akcent align-self-center" type="submit">Сохранить изменения</button>
            </form>
        </div>
        @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('moderator'))
        <div class="form__settings d-flex flex-column align-items-center" style="margin-top: -10vh">
            <a href="{{ route('worker.index') }}">
                <button class="form__btn border-left fc-white bc-akcent align-self-center">Королевская панель</button>
            </a>
        </div>
        @endif
         @if (auth()->user()->hasRole('admin'))
        <div class="form__settings d-flex flex-column align-items-center" >
            <a href="{{ route('dashboard') }}">
                <button class="form__btn border-left fc-white bc-akcent align-self-center">Админ панель</button>
            </a>
        </div>
        @endif
    </div>
</div>
</section>
@endsection