@extends('layout.base')
@section('title')
Получить файл
@endsection
@section('body')
<div class="container">
<div class="card mb-3 text-center">
{{-- <img src="" class="card-img-top" alt="..."> --}}
<div class="card-body">
@if($file)
    <h5 class="card-title">{{$file->name}}.{{$file->extension}}<br><br></h5>
    <p class="card-text">Размер: {{$file->size}} МБ<br></p>
    <p class="card-text">Создан: {{$file->created_at}}</p>
    <p class="card-text">
    <a href="{{$downloadUrl}}" id="downloadFile" class="btn btn-primary">Скачать</a>
    </p>
    @else
    <h5 class="card-title">Ссылка на файл больше недействительна!<br><br></h5>
        <p class="card-text">Если вы владелец файла, создайте ссылку заново!</p>
    <a href="{{route('storage')}}" id="downloadFile" class="btn btn-primary">К диску</a>
@endif
</div>
</div>
@endsection
</div>
@section('scripts')
<script src="{{ asset('js/ajax/ajax.js') }}"></script>
<script src="{{ asset('js/ajax/ajax.js') }}"></script>
@endsection