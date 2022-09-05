@foreach($files as $file)
<div id="file" class="p-2 file" data-file="{{ base64_encode($file->id)}}">
<div class="card border border-0 text-center disk">
@php $imgSrc = 'http://s1.iconbird.com/ico/2013/9/450/w256h2561380453900FileDocument256x25632.png' @endphp
@foreach($imageExtensions as $extension)
@if($extension == $file->extension)
@php $imgSrc = asset('file/get/'.base64_encode($file->id).'/thumbnail/') @endphp
@endif
@endforeach
<img src="{{ $imgSrc }}" class="card-img-top" alt="...">
<div class="card-body">
@if($file->extension == '')
<p id="file-name" class="fs-6">{{$file->name}}</p>
@else
<p id="file-name" class="fs-6">{{$file->name}}.{{$file->extension}}</p>
@endif
<input id="file-size" type="hidden" value="{{$file->size}}">
<input id="file-date-create" type="hidden" value="{{$file->created_at}}">
<input id="file-extension" type="hidden" value="{{$file->extension}}">
<input id="file-public-link" type="hidden" value="{{$file->public_link}}">
</div>
</div>
</div>
@endforeach