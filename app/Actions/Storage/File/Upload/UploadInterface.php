<?php

namespace App\Actions\Storage\File\Upload;

use App\Http\Requests\Storage\FileRequest;

interface UploadInterface 
{
    public function collectAndUpload(FileRequest $request): void;
    public function getMessage(): array;
}
