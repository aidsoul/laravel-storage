<?php

namespace App\Actions\Helper;

use App\Models\FileModel;
use App\Models\FolderModel;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class FileHelper
{

    private Authenticatable $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }
    /**
     * Get user folder
     *
     * @return string
     */
    public function userPath(): string
    {
        return $this->user->email . '/';
    }

    /**
     * Ger user file 
     *
     * @param string $fileName
     * @return string
     */
    public function userPathWithFile(string $fileName): string
    {
        return $this->userPath() . $fileName;
    }

    /**
     * Get a thumbnail folder
     *
     * @return string
     */
    public function thumbnailPath(): string
    {
        return $this->userPath() . 'thumbnail/';
    }

    /**
     * Get the path to the thumbnail 
     *
     * @param string $fileName
     * @param string $fileExtension
     * 
     * @return string
     */
    public function thumbnailPathWithFile(string $fileName, string $fileExtension): string
    {
        return $this->thumbnailPath() . $fileName . '.' . $fileExtension;
    }

    /**
     * Check if a user file exists
     *
     * @param string|int $idFile
     * 
     * @return \App\Models\FileModel|boolean
     */
    public function existUserFile(string|int $idFile): FileModel|bool
    {
        $file = FolderModel::select(['id'])->where('user_id', $this->user->id)
            ->with('files', function ($query) use ($idFile) {
                $query->where('file_id', $idFile);
            })->first();

        return $file['files'][0] ?? false;
    }

    /**
     * Get the link to the class
     *
     * @return FileHelper
     */
    public static function get(): FileHelper
    {
        return new self;
    }
}
