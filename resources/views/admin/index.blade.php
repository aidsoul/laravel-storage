@extends('layout.admin')
@section('title', 'Админ панель')
@section('menu')
<li class="nav-item">
    <a class="nav-link active" aria-current="true" href="{{ route('admin') }}">Главная</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.users') }}">Пользователи</a>
</li>
@endsection
@section('card-body')
<h5>Панель управления<h5>

@endsection