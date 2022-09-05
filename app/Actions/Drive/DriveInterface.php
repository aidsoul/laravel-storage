<?php 

namespace App\Actions\Drive;

use App\Actions\Drive\Download\DownloadInterface;
use App\Actions\Drive\Share\ShareInterface;
use App\Actions\Drive\Thumbnail\ThumbnailInterface;

interface DriveInterface
{
    public static function share(): ShareInterface;
    public static function thumbnail(): ThumbnailInterface;
    public static function download(): DownloadInterface;
}
