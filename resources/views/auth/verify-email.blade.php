@extends('layout.auth')
@section('title', 'Подтвердите e-mail')
@section('cart-header', 'Подтвердите свой e-mail адрес')
@section('card-body')
@if (session('message'))
@include('message.success',['alertMessage' => session('message')])
@endif
    <a href="{{ route('verification.send') }}" class="w-100 btn btn-lg btn-primary" name="store" type="submit">Выслать письмо повторно</a>
@endsection