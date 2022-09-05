<?php

namespace App\Http\Controllers\Storage;

use App\Actions\Storage\Storage;
use App\Http\Controllers\Controller;
use App\Models\FolderModel;
use Illuminate\Support\Facades\Auth;

class StorageController extends Controller
{
    public function index(string $id = '')
    {
        $user = Auth::user();
        if (!empty($id)) {
            $folder = FolderModel::find(base64_decode($id));
            if (!$folder || $folder->user_id !== $user->id) abort(404);
        } else {
            $folder = FolderModel::where('user_id', $user->id)->first();
        }
        $folders = $folder->defaultOrder()
            ->descendantsOf($folder->id)
            ->toTree($folder->id);
        $files = $folder->files()->orderBy('name', 'desc')->paginate(15);
        $breadcrumb = $folder->ancestors;
        return view('storage.index', [
            'userId' => $user->id,
            'userEmail' => $user->email,
            'admin' => $user->role,
            'userFullName' => $user->lastname . ' ' . $user->firstname,
            'storage_size' => $user->storage_size,
            'storage_size_used' => $user->storage_size_used,
            'storageUsed' =>  Storage::sizeUsed($user->storage_size, $user->storage_size_used),
            'folder' => base64_encode($folder->id),
            'folderName' => $folder->name,
            'folders' => $folders,
            'files' => $files,
            'breadcrumb' => $breadcrumb,
            'imageExtensions' => ['jpg', 'png', 'jpeg']
        ]);
    }
}
