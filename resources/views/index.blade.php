@extends('layout.base')
@section('title', 'Онлайн хранилище!')
@section('body')
<main class="container w-25">
    <div class="bg-light p-5 rounded mt-3">
        <div class="d-flex flex-column flex-wrap mb-3">
            <h3 class="text-center">Онлайн хранилище</h3>
        </div>
        <div class="d-flex flex-column mb-3">
            <a class="btn btn-lg btn-primary" href="{{ route('register') }}"
                role="button">Регистрация</a>
        </div>
        <div class="d-flex flex-column mb-3">
            <a class="btn btn-lg btn-primary" href="{{ route('login') }}" role="button">Вход</a>
        </div>

    </div>
<main>
@endsection