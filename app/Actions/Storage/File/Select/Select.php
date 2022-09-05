<?php

namespace App\Actions\Storage\File\Select;

use App\Actions\Helper\FileHelper;
use App\Http\Resources\FileResource;
use App\Models\FileModel;
use App\Models\FolderModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PHPUnit\TextUI\Help;

/**
 * Select file class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Select implements SelectInterface
{
    /**
     * @param string $id
     * @return object|boolean
     */
    public function run(string $id): object|bool
    {
        /**
         * !!! Довести до ума
         */
        $user = Auth::user();
        $file = new FileModel(); 
        $file = $file->find(base64_decode($id));
        $folder = $file->folder[0];
        if($file){
            if ($folder['user_id'] == $user->id) {
                return $file ? FileResource::make($file->find(base64_decode($id))) : abort(404);
            }
        }else{
            abort(404);
        }    
    }
}
