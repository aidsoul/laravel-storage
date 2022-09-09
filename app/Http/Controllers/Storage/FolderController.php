<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use App\Actions\Storage\Folder\Folder;
use App\Http\Requests\Storage\FolderCreateForm;

class FolderController extends Controller
{
    /**
     * Create folder function
     * 
     * @param \App\Http\Requests\Storage\FolderCreateForm $request
     * @param string $id
     * 
     * @return void
     */
    public function create(FolderCreateForm $request, string $id)
    {
        return Folder::create()->run($request, $id) ?
            back()->with('fileMessageSuccess', 'Папка создана!') :
            back()->with(
                'fileMessageDanger',
                'Такая папка уже имеется в данной директории'
            );
    }

    /**
     * Delete folder function
     *
     * @param string $id
     * 
     * @return void
     */
    public function delete(string $id)
    {
        return Folder::delete()->run($id) ? 1 : abort(404);
    }
}
