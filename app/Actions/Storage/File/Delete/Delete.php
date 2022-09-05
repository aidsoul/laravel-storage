<?php

namespace App\Actions\Storage\File\Delete;

use App\Models\FileModel;
use App\Models\UserModel;
use App\Actions\Helper\FileHelper;
use App\Actions\Sibling;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Delete file class
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
        $helper = FileHelper::get();
        $user = Auth::user();
        $file = FileModel::find(base64_decode($id));
        $folder = $file->folder->where('user_id', Auth::user()->id)->first();

        if ($folder->user_id == $user->id) {

            $path = Sibling::get($folder, $folder->id) .'/'. $file->encrypted_name;
            if(Storage::disk('private')->exists($path)){

                Storage::delete($path);
                $imageExtensions = ['jpg', 'png', 'jpeg'];
                if (in_array($file->extension, $imageExtensions)) {
                    Storage::delete($helper->thumbnailPathWithFile($id, $file->extension));
                }
                $user = UserModel::find(Auth::user()->id);
                $user->storage_size_used = $user->storage_size_used - $file->size;
                $user->save();
                $file->delete();
            }
        }
        
        return $file ? 1 : 0;
    }
}
