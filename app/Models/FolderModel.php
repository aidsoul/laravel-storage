<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class FolderModel extends Model
{
    use HasFactory, NodeTrait;

    protected $table = 'folders';

    protected $fillable = [
        'id',
        'name',
        'user_id',
        '_lft',
        '_rgt',
        'parent_id',
        'created_at'
    ];


    public function files()
    {
        return $this->belongsToMany(FileModel::class, 'folders_files', 'folder_id', 'file_id');
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }
}
