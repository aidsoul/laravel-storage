<?php 

namespace App\Actions\Drive\Thumbnail;

use App\Actions\Helper\FileHelper;
use App\Models\FileModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Thumbnail class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Thumbnail implements ThumbnailInterface
{
    /**
     * @param string $id
     * 
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function get(string $id): BinaryFileResponse
    {
        $user = Auth::user();
        $file = FileModel::find(base64_decode($id)); 
        
        if($file){
            $folder = $file->folder;
            if ($file->folder[0]['user_id'] == $user->id) {
                $fileSend = response()->file(Storage::path(FileHelper::get()->thumbnailPathWithFile($id, $file->extension)));
            } else {
                $fileSend = abort(404);
            }
        }else{
            $fileSend = abort(404);
        }  

        return $fileSend;
    }
}
