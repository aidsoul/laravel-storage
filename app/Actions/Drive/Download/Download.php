<?php

namespace App\Actions\Drive\Download;

use App\Actions\Crypt\Crypt;
use App\Actions\Sibling;
use App\Models\FileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Dowload class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Download implements DownloadInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return boolean|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function run(Request $request, string $id): bool|StreamedResponse
    {
        if (!$request->hasValidSignature()) {
            return false;
        }
        $file = FileModel::find(Crypt::decrypt()->run($id));
        $folder = $file->folder->first();
        if (!empty($file->public_link)) {
            $path = Sibling::get($folder, $folder->id) . '/' . $file->encrypted_name;
            $downloadName = '';
            if (empty($file->extension)) {
                $downloadName = $file->name;
            } else {
                $downloadName = $file->name . '.' . $file->extension;
            }
            return Storage::disk('private')->exists($path) ?
                Storage::download($path, $downloadName) :
                false;
        }
    }
}
