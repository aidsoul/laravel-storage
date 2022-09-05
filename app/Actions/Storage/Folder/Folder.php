<?php

namespace App\Actions\Storage\Folder;

use App\Actions\Sibling;
use App\Http\Requests\Storage\FolderCreateForm;
use App\Models\FolderModel;
use Illuminate\Support\Facades\Storage;

/**
 * Folder class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Folder implements FolderInterface
{   
    /**
     * Create folder function
     *
     * @param \App\Http\Requests\Storage\FolderCreateForm $request
     * @param string $id
     * 
     * @return boolean
     */
    public function create(FolderCreateForm $request, string $id): bool
    {
        $validate = $request->validated();
        $user = Auth()->user();
        $folderId = base64_decode($id); 
        $folder = new FolderModel();
        $folder->name = $validate['folderName'];
        $folder->user_id = $user->id;
        $folder->parent_id = $folderId;
        $path = '';

        $path = Sibling::get($folder, $folderId);
        $pathSave = $path . '/' . $validate['folderName'];
        if(!Storage::disk('private')->exists($pathSave))
        {
            Storage::makeDirectory($pathSave);
            $folder->save();
            return true;
        }else{
            return false;
        }
        
    }
}