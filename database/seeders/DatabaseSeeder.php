<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\FileModel;
use App\Models\FolderModel;
use App\Models\FolderFileModel;
use App\Models\UserModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // UserModel::factory(1)->create();
        FolderModel::factory(5)->create();
        // FileModel::factory(5)->create();
        // FolderFileModel::factory(5)->create();
    }
}
