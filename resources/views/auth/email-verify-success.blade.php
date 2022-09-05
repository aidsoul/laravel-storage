@isset($message)
@extends('layout.base')
@section('title', 'Вы подтвердили свой email')
@section('body')
<main class="container w-25">
    <div class="card">
  <div class="card-header">
    @include('message.success',['alertMessage' => $message])
  </div>
  <div class="card-body">
      <a href="{{ route('storage') }}" class="btn btn-primary">К вашему Онлайн диску</a>
</div>
</main>
@endsection
@endisset