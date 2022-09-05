@extends('layout.base')
@section('title', 'Ваш аккаунт заблокирован!')
@section('body')
<main class="container text-center">
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Ваш аккаунт заблокирован!</h4>
        <p>Если это ошибка сообщите администратору</p>
        <a href="{{ route('logout') }}" class="btn btn-primary">Выход</a>
    </div>
</main>
@endsection