@extends('layout.auth')
@section('title', 'Редактирование пользователя')
@section('cart-header'){{$user->lastname}} {{$user->firstname}}@endsection
@section('card-body')
@if (session('editMessage'))
@include('message.success',['alertMessage' => session('editMessage')])
@endif
<form method="POST" action="{{ route('admin.users.edit.update',['id'=>base64_encode($user->id)]) }}">
    @csrf
    @method('PUT')
    @if (session('notData'))
    @include('message.danger',['alertMessage' => session('notData')])
    @endif
    <div class="d-flex flex-column mb-3">
        <div class="p-2">
            <label for="floatingInput">Роль</label>
            <div class="form-floating">
                    <select disabledAttribute class="form-select" aria-label="User roles" name="role">
                        @php $role = 'Администратор' @endphp
                        <option selected></option>
                        @if($user->role)
                        <option value="0">Пользователь</option>
                        @else
                        @php $role = 'Пользователь' @endphp
                        <option value="1">Администратор</option>
                        @endif
                        </select>
                        <label for="floatingInput">Текущая роль: {{ $role }}</label>
                        @include('message.danger-form',['field' => 'role'])
                </div>
        </div>
        <div class="p-2">
            <label for="floatingInput">Блокировка профиля</label>
                <div class="form-floating">
                    <select disabledAttribute class="form-select" aria-label="User blocked" name="blocked">
                    <option selected></option>
                    @php $blocked = 'Не заблокирован' @endphp
                    @if($user->blocked)
                    @php $blocked = 'Заблокирован' @endphp
                    <option value="0">Разблокировать</option>
                    @else
                    <option value="1">Заблокировать</option>
                    @endif
                    </select>
                    <label for="floatingInput">Профиль: {{ $blocked }} </label>
                    @include('message.danger-form',['field' => 'blocked'])
            </div>  
        </div>
        <div class="p-2">
            <label for="floatingInput">Размер диска</label>
            <div class="form-floating">
                    <input disabledAttribute onlynumbers type="text" name="storage_size" class="form-control"  min="1" max="4" placeholder="Размер хранилища">
                    <label for="floatingInput">Сейчас: {{$user->storage_size}} Мб.</label>
                        @include('message.danger-form',['field' => 'storage_size'])
            </div>
        </div>  
        <div class="p-2">
            <button class="w-100 btn btn-lg btn-primary" type="submit" id="update-submit">Обновить</button>
    </div>
        <div class="p-2">
            <a href="{{ route('admin.users') }}" class="w-100 btn btn-outline-success">Назад</a>
        </div>
</form>
@endsection
@section('scripts')
<script src="{{ asset('js/validation/onlynumbers.js') }}"></script>
<script src="{{ asset('js/validation/disabledAttribute.js') }}"></script>
@endsection