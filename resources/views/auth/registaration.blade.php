@extends('layout.auth')
@section('title', 'Регистрация')
@section('cart-header', 'Регистрация')
@section('card-body')
    <form method="POST" action="{{ route('register.store') }}">
    @csrf
        <div class="d-flex flex-column mb-3">
            <div class="p-2">
                <div class="form-floating">
                    <input patternfio type="text" name="firstname" class="form-control"  min="3" max="45" placeholder="Имя" required value="{{old('firstname')}}">
                    <label for="floatingInput">Имя</label>
                        @include('message.danger-form',['field' => 'firstname'])
                </div>
            </div>
            <div class="p-2">
                <div class="form-floating">
                    <input patternfio type="text" name="lastname" class="form-control"  min="3" max="45" placeholder="Фамилия" required value="{{old('lastname')}}">
                    <label for="floatingInput">Фамилия</label>
                    @include('message.danger-form',['field' => 'lastname'])
                </div>
            </div>
            <div class="p-2">
                    <div class="form-floating">
                        <input patternemail type="email" name="email" class="form-control" min="3" max="50" placeholder="name@example.com" required value="{{old('email')}}">
                        <label for="floatingInput">Email</label>
                    @include('message.danger-form',['field' => 'email'])
                    </div>
            </div>
            <div class="p-2">
                    <div class="form-floating">
                        <input rmtagcyrillic type="password" name="password" class="form-control"  min="6" max="50" placeholder="Password" required>
                        <label for="floatingPassword">Пароль</label>
                        @include('message.danger-form',['field' => 'password'])
                    </div>
            </div>
            <div class="p-2">
                    <div class="form-floating">
                        <input rmtagcyrillic type="password" name="password_confirmation" class="form-control"  min="6" max="50" placeholder="Password" required>
                        <label for="floatingPassword">Повторите пароль</label>
                        @include('message.danger-form',['field' => 'password_confirmation'])
                    </div>
            </div>
                <div class="p-2">
                    <div class="form-floating">
                        <button class="w-100 btn btn-lg btn-primary" type="submit"
                            name="store">Зарегистрироваться</button>
                        <div>
                        </div>
                    </div>
                </div>
                <div class="p-2">
                    <div class="form-floating">
                        <a href="{{ route('index') }}" class="w-100 btn btn-outline-success">Назад</a>
                        <div>
                </div>
        </div>
    </form>
@endsection
@section('scripts')
<script src="{{ asset('js/validation/tagcyrillic.js') }}"></script>
<script src="{{ asset('js/validation/patternfio.js') }}"></script>
<script src="{{ asset('js/validation/patternemail.js') }}"></script>
@endsection