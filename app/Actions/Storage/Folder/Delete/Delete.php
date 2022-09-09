<?php

namespace App\Actions\Storage\Folder\Delete;

use App\Actions\Helper\FileHelper;
use App\Actions\Sibling;
use App\Models\FolderModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Delete folder class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Delete implements DeleteInterface
{   
    /**
     * @param string $id
     * 
     * @return integer
     */
    public function run(string $id): int
    {
        $folderId = base64_decode($id);
        $folder = FolderModel::find($folderId);
        $user = Auth::user();
        if($folder && $folder->user_id == $user->id)
        {
            $path = Sibling::get($folder, $folderId);
            $sizeTotal = 0;
            // ancestors
            foreach($folder->descendantsAndSelf($folderId) as $descendant)
            {
                foreach($descendant->files()->get() as $file)
                {
                    if(!empty($file))
                    {
                    // get file size
                    $sizeTotal += $file->size;
                    $file->delete();
                    $imageExtensions = ['jpg', 'png', 'jpeg'];
                    if (in_array($file->extension, $imageExtensions)) {
                        Storage::delete(FileHelper::get()->thumbnailPathWithFile(base64_encode($file->id), $file->extension));
                    }
                    }
                }
                
            }
            Storage::deleteDirectory($path);
            $folder->delete();
            $user = UserModel::find($user->id);
            $user->storage_size_used = $user->storage_size_used - $sizeTotal;
            $user->save();

            return 1;
        }
        return 0;
    }
}