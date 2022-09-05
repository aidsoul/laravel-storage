@extends('layout.base')
@section('body')
<main class="container w-70">
<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            @yield('menu')
        </ul>
    </div>
    <div class="card-body">
        @yield('card-body')
    </div>
</div>
    <div class="mt-1">
        <a href="{{ route('storage') }}" class="w-100 btn btn-outline-success" name="update" type="submit">К диску</a>
    </div>
</main>
@endsection

@section('scripts')

<script src="{{ asset('js/validation/validations.js') }}"></script>
@endsection