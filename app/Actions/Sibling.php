<?php

namespace App\Actions;

use App\Models\FolderModel;

class Sibling 
{
    public static function get(FolderModel $folder, int $folderId)
    {
        $path = '';
        foreach($folder->ancestorsAndSelf($folderId) as $sibling)
        {
            $path.= '/'. $sibling->name;
        }
        
        return $path;
    }
}