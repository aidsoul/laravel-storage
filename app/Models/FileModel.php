<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileModel extends Model
{
    use HasFactory;

    protected $table = 'files';

    protected $fillable = [
        'name',
        'encrypted_name',
        'extension',
        'size',
        'public_link',
        'created_at'
    ];

    public function folder()
    {
        return $this->belongsToMany(FolderModel::class,'folders_files','file_id','folder_id');
    }
}
