<?php

namespace App\Actions\Drive;

use App\Actions\Drive\Download\Download;
use App\Actions\Drive\Download\DownloadInterface;
use App\Actions\Drive\Share\Share;
use App\Actions\Drive\Share\ShareInterface;
use App\Actions\Drive\Thumbnail\Thumbnail;
use App\Actions\Drive\Thumbnail\ThumbnailInterface;

/**
 * Drive class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Drive implements DriveInterface
{
    /**
     * Get Thumbnail class
     *
     * @return \App\Actions\Drive\Thumbnail\ThumbnailInterface
     */
    public static function thumbnail(): ThumbnailInterface
    {
        return new Thumbnail();
    }

    /**
     * Get share class
     * 
     * @return \App\Actions\Drive\Share\ShareInterface
     */
    public static function share(): ShareInterface
    {
        return new Share();
    }

    /**
     * Download public file
     *
     * @return \App\Actions\Download\DownloadInterface
     */
    public static function download(): DownloadInterface
    {
        return new Download();
    }
}
