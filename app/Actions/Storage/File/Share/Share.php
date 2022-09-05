<?php

namespace App\Actions\Storage\File\Share;

use App\Models\FileModel;
use App\Actions\Crypt\Crypt;
use App\Actions\Helper\FileHelper;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

/**
 * Share file 
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Share implements ShareInterface
{
    /**
     * @param string $id
     * @return array
     */
    public function run(string $id): array
    {
        $user = Auth::user();
        $fileId = base64_decode($id);
        $file = FileModel::find($fileId);
        $folder = $file->folder->where('user_id', $user->id)->first();
        if ($file && !empty($folder->id)) {
            if (empty($file->public_link)) {
                $fileSend = URL::temporarySignedRoute(
                    'file.get',
                    now()->addMinutes(config('storage.file_link_lifetime')),
                    ['id' => Crypt::encrypt()->run($fileId)]
                );
                $file->public_link = explode('/get/', $fileSend, 2)[1];
                $file->save();
                $fileSend = ['share' => $fileSend];
            } else {
                $fileSend = ['link' => $file->public_link];
            }
        } else {
            $fileSend = ['error' => 'Нет такого файла'];
        }

        return $fileSend;
    }
}
