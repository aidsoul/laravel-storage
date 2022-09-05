<?php

namespace App\Actions\Storage\File\Download;

use App\Actions\Helper\FileHelper;
use App\Actions\Sibling;
use App\Models\FileModel;
use App\Models\FolderModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Download file class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Download implements DownloadInterface
{
    /**
     * @param string $id
     * 
     * @return integer|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function run(string $id): int|StreamedResponse
    {
        $fileId = base64_decode($id);
        $file = FileModel::find($fileId);
        $folder = $file->folder->where('user_id', Auth::user()->id)->first();
        if ($file && !empty($folder->id)) {
            $path = Sibling::get($folder, $folder->id) . '/' . $file->encrypted_name;
            $downloadName = '';
            if (empty($file->extension)) {
                $downloadName = $file->name;
            } else {
                $downloadName = $file->name . '.' . $file->extension;
            }

            return Storage::disk('private')->exists($path) ?
                Storage::download($path, $downloadName) :
                0;
        } else {
            return 0;
        }
    }
}
