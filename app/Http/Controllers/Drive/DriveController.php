<?php

namespace App\Http\Controllers\Drive;

use App\Actions\Drive\Drive;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DriveController extends Controller
{
    public function share(Request $request, string $id)
    {
        $file = Drive::share()->open($request, $id);
        $view = 'drive.share';
        
        return $file['file'] ? view($view, [
            'file' => $file['file'],
            'downloadUrl' => $file['downloadUrl']
        ]) : view($view,[ 'file' => $file['file']]);
    }

    public function download(Request $request, string $id)
    {
        $drive = Drive::download()->run($request, $id);

        return $drive ? $drive : abort(404);
    }

    public function thumbnail(string $id)
    {
        return Drive::thumbnail()->get($id);
    }
}
