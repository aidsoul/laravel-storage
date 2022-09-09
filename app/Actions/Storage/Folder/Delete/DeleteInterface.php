<?php

namespace App\Actions\Storage\Folder\Delete;

interface DeleteInterface
{   
    public function run(string $id): int;
}