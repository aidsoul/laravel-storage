<?php

namespace App\Actions\Storage\File;

use App\Actions\Storage\File\Delete\Delete;
use App\Actions\Storage\File\Delete\DeleteInterface;
use App\Actions\Storage\File\Download\Download;
use App\Actions\Storage\File\Download\DownloadInterface;
use App\Actions\Storage\File\Select\Select;
use App\Actions\Storage\File\Select\SelectInterface;
use App\Actions\Storage\File\Share\Share;
use App\Actions\Storage\File\Share\ShareInterface;
use App\Actions\Storage\File\Update\Update;
use App\Actions\Storage\File\Update\UpdateInterface;
use App\Actions\Storage\File\Upload\Upload;
use App\Actions\Storage\File\Upload\UploadInterface;

/**
 * Factory for managing file functions
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class File implements FileInterface
{
    /**
     * Upload file
     *
     * @return \App\Actions\Storage\File\Upload\UploadInterface
     */
    public static function upload(): UploadInterface
    {
        return new Upload();
    }

    /**
     * Delete file
     *
     * @return \App\Actions\Storage\File\Delete\DeleteInterface
     */
    public static function delete(): DeleteInterface
    {
        return new Delete();
    }

    /**
     * Download file
     *
     * @return \App\Actions\Storage\File\Download\DownloadInterface
     */
    public static function download(): DownloadInterface
    {
        return new Download();
    }

    /**
     * Select file
     *
     * @return \App\Actions\Storage\File\Select\SelectInterface
     */
    public static function select(): SelectInterface
    {
        return new Select();
    }

    /**
     * Update file
     *
     * @return \App\Actions\Storage\File\Update\UpdateInterface
     */
    public static function update(): UpdateInterface
    {
        return new Update();
    }

    /**
     * Share file
     *
     * @return \App\Actions\Storage\File\Share\ShareInterface
     */
    public static function share(): ShareInterface
    {
        return new Share();
    }
}
