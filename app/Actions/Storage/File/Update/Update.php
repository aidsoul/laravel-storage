<?php

namespace App\Actions\Storage\File\Update;

use App\Http\Requests\Storage\FileChangeNameRequest;
use App\Models\FileModel;

/**
 * Update file 
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Update implements UpdateInterface
{
    /**
     * @param \App\Http\Requests\Storage\FileChangeNameRequest $request
     * 
     * @return bool
     */
    public function fileName(FileChangeNameRequest $request): bool
    {
        $validate = $request->validated();  
        $file = FileModel::find(base64_decode($validate['fileI']));
        if($file && $file->name != $validate['fileName'])
        {
            $file->name = $validate['fileName'];
            $file->save();

            return true;
        }else
        {
            return false;
        }
    }   
}
