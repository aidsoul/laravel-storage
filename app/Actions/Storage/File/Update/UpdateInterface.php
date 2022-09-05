<?php

namespace App\Actions\Storage\File\Update;

use App\Http\Requests\Storage\FileChangeNameRequest;

interface UpdateInterface
{    
    /**
    * @param \App\Http\Requests\Storage\FileChangeNameRequest $request
    *
    * @return bool
    */
    public function fileName(FileChangeNameRequest $request): bool;
}
