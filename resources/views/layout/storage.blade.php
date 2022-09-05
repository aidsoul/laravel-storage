@extends('layout.base')
@section('body')
@section('links')
<link rel="stylesheet" href="{{ asset('css/storage.css') }}">
@endsection
<div class="container-xl">
<!-- Modal -->
<div class="modal fade" id="storagemodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
    <div id="modal-delete" class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Вы уверены?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        Файл будет удалён без возможности восстановления!
        </div>
        <div class="modal-footer">
        <button id="modalOk" type="button" class="btn btn-primary">Удалить</button>
        </div>
    </div>
    </div>
</div>
<div class="modal fade" id="modal-folder-delete" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
    <div id="modal-delete" class="modal-content">
        <div class="modal-header">
        <h5 id="modal-delete-title" class="modal-title">Вы уверены?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="modal-delete-body" class="modal-body">
            Все вложенные файлы и папки будут удалены!
        </div>
        <div class="modal-footer">
        <button id="modal-folder-delete-button" type="button" class="btn btn-primary">Удалить</button>
        </div>
    </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="share-file-modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header text-center">
        <h5 id="share-file-info" class="modal-title w-100"></h5>
        </div>
        <div class="modal-body">
        <div>Время жизни ссылки в минутах: {{config('storage.file_link_lifetime')}} </div>
        <hr>
        <a id="go-to-file" href="" class="btn btn-primary w-100"></a>
        </div>
    </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-8">
            @if (session('fileMessageSuccess'))
            @include('message.success',['alertMessage' => session('fileMessageSuccess')])
            @endif
            @if (session('fileMessageDanger'))
            @include('message.danger',['alertMessage' => session('fileMessageDanger')])
            @endif
            <!-- Left block -->
                <div class="d-flex flex-column mb-3">
                    <!-- level #1 -->
                    <div class="mb-3">
                        <div class="d-flex flex-row flex-wrap justify-content-center mb-3">
                            <!-- Select file -->
                            <div class="mt-2 flex-fill">
                            {{-- Add file --}}
                            <form method="POST" action="{{ route('storage.upload.file') }}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="d-flex flex-row mb-3">
                                        <div class="p-2">
                                            <input class="form-control form-control-sm" name="fileUpload" type="file">
                                            @include('message.danger-form',['field' => 'fileUpload'])
                                        </div>
                                        <div class="p-2"> 
                                            <button type="submit" class="btn btn-primary btn-sm">Загрузить</button>
                                        </div>
                                    </div>
                                    <input id="folder-id" name="folderId" value="{{$folder}}" type="hidden">
                                </form>
                            </div>
                            <!-- Striped -->
                            <div class="mt-2 flex-fill text-center">
                                <span storageinfo class="fs-6 ">  Использовано: {{ $storage_size_used }} Мб из {{ $storage_size }} Мб </span>
                                <div class="progress">
                                    <div progressused class="progress-bar" role="progressbar" aria-label="Storage used"
                                        aria-valuemin="0" style="width: {{ $storageUsed }}%" aria-valuemax="100">
                                        {{ $storageUsed }}%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <!-- level #2  -->
                    <div class="mb-3">
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        @foreach($breadcrumb as $k => $v)
                            <li class="breadcrumb-item"><a href="{{route('storage',['id' => base64_encode($v->id)])}}">{{$v->name}}</a></li>
                        @endforeach
                        <li class="breadcrumb-item active" aria-current="page">{{$folderName}}</li>
                        </ol>
                        </nav>
                    </div>
                    <!-- level #3 -->
                    <div class="mb-3">
                        <!-- Folders and Files -->
                        <div  id="folders-and-files" class="d-flex flex-row flex-wrap mb-3">
                            @yield('foldersFiles')
                        </div>
                    </div> 
                    <div class="mb-3 lign-self-end">
                        <!-- level #4 -->
                            <!-- Pagination -->
                            {{$files->links()}}
                    </div>
                </div>  
            </div>
        <!-- Right block -->
        <div class="col-6 col-md-4">
            <div class="d-flex flex-column mb-3 sticky-top">
                <!-- User panel -->
                <div class="p-2 border-bottom">
                        <div class="card border-0 text-center profile_card">
                            <div class="card-body">
                                <div class="d-flex flex-column d-flex align-items-center">
                                    <div class="user-image">
                                        <img class="img-fluid" src="https://cdn-icons-png.flaticon.com/512/668/668709.png" alt="user-profile">
                                    </div>
                                    <div class="align-self-center">
                                        <div class="d-flex flex-column">
                                            <div username class="p-1 user-name fs-6 text">{{  $userFullName }}</div>
                                            @if($admin)
                                            <div class="p-1 admin">
                                                <a href="{{ route('admin') }}"
                                                class="btn btn-primary btn-sm">Admin панель</a>
                                            </div>
                                            @endif
                                            <div class="p-1 logout">   <a href="{{ route('logout') }}"
                                                class="btn btn-primary btn-sm">Выход</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
                <!-- File info block -->
                <div class="p-2">
                {{-- Folder --}}
                    <div id="folder-functions" class="d-flex flex-column mb-3 align-items-center border-bottom">
                        <div id="folder-functions-delete" class="p-2 border-bottom">
                            <input value="" id="folder-temporaryId" type="hidden">
                            <p class="folder-delete-info" style="text-center">Удалить выбранную папку?</p>
                            <button id="folder-delete-button" class="w-100 btn btn-primary" role="button" data-bs-toggle="modal" data-bs-target="#modal-folder-delete">Удалить</button>
                        </div>
                        <div class="p-2">
                        <form method="GET" action="{{ route('storage.folder.create', ['id' => $folder]) }}">
                            @csrf
                            <div class="p-1">
                                <label for="floatingPassword" class="text-center">Создать папку</label>
                                <input rmtag type="text" name="folderName" class="form-control" min="1" max="30" placeholder="Имя папки" required>
                            </div>
                            <div class="p-1">
                                @include('message.danger-form',['field' => 'folderName'])
                            <button class="w-100 btn btn-primary" type="submit">Создать</button>
                            </div>  
                        </form>
                        </div>
                    </div>
                    {{-- File --}}
                    <div id="file-functions" class="d-flex flex-column mb-3 align-items-center">
                        <!-- Info -->
                        <div class="p-2 border-bottom">
                            <div class="d-flex flex-column align-items-center">
                                <div class="mb-1">
                                    <h5>Выбранный файл</h5>
                                <input fileid  value="" hidden>
                                </div>
                                <div filename class="mb-1">
                                </div>
                                <div filesize class="mb-1">
                                </div>
                                <div filedate class="mb-1">
                                </div>
                                <div publicaccess class="mb-1">
                                </div>
                            </div>
                        </div>
                        <!-- Function buttons -->
                        <div class="p-2">
                            <div class="d-flex flex-column align-items-center">
                                <div class="p-2">
                                    <img class="img-preview" src="" hidden>
                                </div>
                                <div class="p-2">
                                    <form method="POST" action="{{ route('storage.change.file-name') }}">
                                        @csrf
                                        <div class="p-1">
                                            <label for="floatingPassword">Изменить имя файла</label>
                                            <input id="form-change-file" name="fileI" type="hidden">
                                            <input rmtag type="text" name="fileName" class="form-control" min="1" max="25" placeholder="Имя файла" required>
                                        </div>
                                        <div class="p-1">
                                            @include('message.danger-form',['field' => 'fileName'])
                                        <button class="w-100 btn btn-primary" type="submit">Изменить</button>
                                        </div>  
                                    </form>
                                </div>
                                <div class="p-1">
                                    <a id="downloadFile" href="#" class="btn btn-primary">Скачать</a>
                                </div>
                                <div class="p-1">
                                    <a id="shareFile" class="btn btn-primary" data-bs-toggle="modal" href="#share-file-modal" role="button">Поделиться</a>
                                </div>
                                <div class="p-1">
                                <button id="deleteFile" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#storagemodal">
                                    Удалить
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/domLoaded.js') }}"></script>
<script src="{{ asset('js/ajax/ajax.js') }}"></script>
<script src="{{ asset('js/ajax/share-file.js') }}"></script>
<script src="{{ asset('js/ajax/delete-file.js') }}"></script>
<script src="{{ asset('js/ajax/downloadFile.js') }}"></script>
<script src="{{ asset('js/ajax/get-file-info.js') }}"></script>
<script src="{{ asset('js/ajax/delete-folder.js') }}"></script>
<script src="{{ asset('js/ajax/folder-action.js') }}"></script>
<script src="{{ asset('js/validation/validations.js') }}"></script>
<script src="{{ asset('js/validation/tag.js') }}"></script>


@endsection