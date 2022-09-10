<?php

namespace App\Actions\Storage\Folder;

use App\Actions\Storage\Folder\Create\CreateInterface;
use App\Actions\Storage\Folder\Delete\DeleteInterface;

interface FolderInterface
{
    public static function create(): CreateInterface;
    public static function delete() : DeleteInterface;
}