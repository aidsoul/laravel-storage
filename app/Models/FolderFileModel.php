<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FolderFileModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'folders_files';

    protected $fillable = [
        'folder_id',
        'file_id'
    ];

    public function folder()
    {
        return $this->hasMany(FolderModel::class, 'id', 'folder_id');
    }

    public function files()
    {
        return $this->hasMany(FileModel::class, 'id', 'file_id');
    }
}
