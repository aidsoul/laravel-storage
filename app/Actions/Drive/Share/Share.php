<?php

namespace App\Actions\Drive\Share;

use App\Models\FileModel;
use App\Actions\Crypt\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

/**
 * Share file class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Share implements ShareInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * 
     * @return array
     */
    public function open(Request $request, string $id): array
    {
        
        $file = FileModel::find(Crypt::decrypt()->run($id));
        if (!$request->hasValidSignature()) {
            $file->public_link = null;
            $file->save();
            $fileSend['file'] = 0;
        } else {
            if (!empty($file->public_link)) {
                $fileSend['downloadUrl'] = URL::temporarySignedRoute(
                    'file.download',
                    now()->addMinutes(config('storage.file_link_lifetime')),
                    ['id' => $id]
                );
                $fileSend['file'] = $file;
            } else {
                $fileSend['file'] = 0;
            }
        }

        return $fileSend;
    }
}
