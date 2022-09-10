<?php

namespace App\Actions\Storage\Folder;

use App\Actions\Storage\Folder\Create\Create;
use App\Actions\Storage\Folder\Create\CreateInterface;
use App\Actions\Storage\Folder\Delete\Delete;
use App\Actions\Storage\Folder\Delete\DeleteInterface;

/**
 * Folder class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Folder implements FolderInterface
{   
    /**
     * Create function
     *
     * @return \App\Actions\Storage\Folder\Create\CreateInterface
     */
    public static function create(): CreateInterface
    {
        return new Create();
    }

    /**
     * Delete function
     *
     * @return \App\Actions\Storage\Folder\Delete\DeleteInterface
     */
    public static function delete() : DeleteInterface
    {
        return new Delete();
    }
}