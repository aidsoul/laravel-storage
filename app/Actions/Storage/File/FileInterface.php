<?php

namespace App\Actions\Storage\File;

use App\Actions\Storage\File\Delete\DeleteInterface;
use App\Actions\Storage\File\Download\DownloadInterface;
use App\Actions\Storage\File\Select\SelectInterface;
use App\Actions\Storage\File\Share\ShareInterface;
use App\Actions\Storage\File\Update\UpdateInterface;
use App\Actions\Storage\File\Upload\UploadInterface;

interface FileInterface  
{
    public static function delete(): DeleteInterface;
    public static function download(): DownloadInterface;
    public static function select(): SelectInterface;
    public static function update(): UpdateInterface;
    public static function upload(): UploadInterface;
    public static function share(): ShareInterface;
}
