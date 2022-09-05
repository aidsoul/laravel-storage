@extends('layout.base')
@section('body')
<main class="container w-25">
<div class="card text-bg-light">
    <div class="card-header"><h1 class="h3 mb-3 fw-normal text-center">@yield('cart-header')</h1></div>
    <div class="card-body">
    @yield('card-body')
    </div>
</div>
</main>
@endsection
@section('gscripts')
<script src="{{ asset('js/validation/validations.js') }}"></script>
@endsection