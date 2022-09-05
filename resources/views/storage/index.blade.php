@extends('layout.storage')
@section('title')Онлайн хранилищe -> {{$folderName}}@endsection
@section('foldersFiles')
@include('storage.folders')
@include('storage.files')
@endsection
