@extends('layout.auth')
@section('title', 'Восстановление пароля')
@section('cart-header', 'Восстановление пароля')
@section('card-body')
<form method="POST" action="{{ route('forgot-password.action') }}">
        @csrf
        <div class="d-flex flex-column mb-3">
                <div class="p-2">
                    <div class="form-floating">
                            <input patternemail type="email" name="email" class="form-control" min="3" max="50" placeholder="name@example.com"required value="{{old('email')}}">
                        <label for="floatingInput">Email</label>
                    </div>
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="p-2">
                    <div class="form-floating">
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Восстановить</button>
                        <div>
                </div>
        </div>
    </form>
@endsection
@section('scripts')
<script src="{{ asset('js/validation/patternemail.js') }}"></script>
@endsection