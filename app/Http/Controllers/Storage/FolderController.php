<?php

namespace App\Http\Controllers\Storage;

use App\Actions\Sibling;
use App\Models\UserModel;
use App\Models\FolderModel;
use App\Actions\Storage\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Actions\Storage\Folder\Folder;
use App\Http\Requests\Storage\FolderCreateForm;

class FolderController extends Controller
{
    public function create(FolderCreateForm $request, string $id)
    {
        return  Storage::folder()->create($request, $id) ?
            back()->with('fileMessageSuccess', 'Папка создана!') :
            back()->with(
                'fileMessageDanger',
                'Такая папка уже имеется в данной директории'
            );
    }

    public function delete(string $id)
    {
        // $folderId = base64_decode($id);
        // $folder = FolderModel::find($folderId);
        
        // if($folder->user_id = Auth::user()->id)
        // {
        //     $path = Sibling::get($folder, $folderId);
        //     dd($path);
        //     Storage::delete($path);
            
        //     $user = UserModel::find(Auth::user()->id);
        //     $user->storage_size_used = $user->storage_size_used - $file->size;
        //     $user->save();
        //     $folder->delete();
        // }
        // return 0;
    }
}
