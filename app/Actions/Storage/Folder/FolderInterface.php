<?php

namespace App\Actions\Storage\Folder;

use App\Http\Requests\Storage\FolderCreateForm;

interface FolderInterface
{
    public function create(FolderCreateForm $request, string $id): bool;
}