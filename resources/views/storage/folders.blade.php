@foreach($folders as $folder)
<div id="folder" class="p-2 folder" data-folder="{{ base64_encode($folder->id)}}"">
<div class="card border border-0 text-center disk">
<img src="{{asset('images/folder.png')}}"
class="card-img-top" alt="...">
<div class="card-body">
<p id="folder-name" class="fs-6">{{$folder->name}}</p>
</div>
</div>
</div>
@endforeach
