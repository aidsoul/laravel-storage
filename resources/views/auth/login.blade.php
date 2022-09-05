@extends('layout.auth')
@section('title', 'Вход')
@section('cart-header', 'Вход')
@section('card-body')
{{-- PasswordForgotMessage --}}
@if (session('passwordForgotMessage'))
@include('message.success',['alertMessage' => session('passwordForgotMessage')])
@endif
{{-- END PasswordForgotMessage --}}
<form method="POST" action="{{ route('login.store') }}">
        @csrf
        <div class="d-flex flex-column mb-3">
                <div class="p-2">
                    <div class="form-floating">
                        <input patternemail type="email" name="email"  min="3" max="50" class="form-control" placeholder="name@example.com" required value="{{old('email')}}"">
                        <label for="floatingInput">Email</label>
                    </div>
                        @include('message.danger-form',['field' => 'email'])
                </div>
                <div class="p-2">
                    <div class="form-floating">
                        <input rmtagcyrillic type="password" name="password" class="form-control" min="3" max="50" placeholder="Password">
                        <label for="floatingPassword">Пароль</label>
                    </div>
                        @include('message.danger-form',['field' => 'password'])
                </div>
                <div class="p-2">
                    <div class="d-flex flex-row mb-3 flex-wrap justify-content-between">
                        <div class="p-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="remember_me" name="remember_me">
                                <label class="form-check-label" for="defaultCheck1">
                                    Запомнить меня
                                </label>
                            </div>
                        </div>
                        <div class="p-2">
                            <a href="{{ route('forgot-password') }}"
                                class="btn btn-outline-danger btn-sm">Забыли пароль?</a>
                        </div>
                    </div>
                </div>
                <div class="p-2">
                    <div class="form-floating">
                        <button class="w-100 btn btn-lg btn-primary" name="store" type="submit">Войти</button>
                    </div>
                </div>
                <div class="p-2">
                    <div class="form-floating">
                    <a href="{{ route('index') }}" class="w-100 btn btn-outline-success">Назад</a>
                    </div>
                </div>
        </div>
    </form>
@endsection
@section('scripts')
<script src="{{ asset('js/validation/tagcyrillic.js') }}"></script>
<script src="{{ asset('js/validation/patternemail.js') }}"></script>
@endsection