<?php

namespace App\Http\Controllers\Storage;

use App\Actions\Storage\File\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storage\FileChangeNameRequest;
use App\Http\Requests\Storage\FileRequest;

class FileController extends Controller
{
    /**
     * Upload file
     *
     * @param string $id
     * 
     * @return void
     */
    public function upload(FileRequest $request)
    {
        $upload = File::upload();
        $upload->collectAndUpload($request);
        $message = $upload->getMessage();

        return back()->with($message[0], $message[1]);
    }

    /**
     * Get file
     *
     * @param string $id
     * 
     * @return void
     */
    public function get(string $id)
    {
        return File::select()->run($id);
    }

    /**
     * Delete file
     *
     * @param string $id
     * 
     * @return void
     */
    public function delete(string $id)
    {
        return File::delete()->run($id);
    }

    /**
     * Download file
     *
     * @param string $id
     * 
     * @return void
     */
    public function download(string $id)
    {
        $file = File::download()->run($id);

        return  $file ? $file : redirect(route('storage'));
    }

    /**
     * Change file name
     *
     * @param string $id
     * 
     * @return void
     */
    public function changeFileName(FileChangeNameRequest $request)
    {
        return File::update()->fileName($request) ? back()->with(
            'fileMessageSuccess',
            'Имя файла изменено!'
        ) :
            back()->with(
                'fileMessageDanger',
                'Такой файл не существует, или текущие имя файла соответствует установленному!'
            );
    }

    /**
     * Share file
     *
     * @param string $id
     * 
     * @return void
     */
    public function share(string $id)
    {
        return response()->json(
            File::share()->run($id),
            200
        );
    }
}
