<?php

namespace App\Actions\Storage\Folder\Create;

use App\Http\Requests\Storage\FolderCreateForm;

interface CreateInterface
{   
    public function run(FolderCreateForm $request, string $id): bool;
}