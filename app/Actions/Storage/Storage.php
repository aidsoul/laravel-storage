<?php

namespace App\Actions\Storage;

use App\Actions\Storage\Folder\Folder;
use App\Actions\Storage\Folder\FolderInterface;

/**
 * Storage class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Storage
{
    /**
     * Getting the memory difference in percent 
     *
     * @param integer $sizeTotal
     * @param float $sizeUsed
     * @return float
     */
    public static function sizeUsed(int $sizeTotal, float $sizeUsed) : float
    {
        if ($sizeUsed > 0) {
            $storageCoefficient  = $sizeTotal / $sizeUsed;
            $storageUsed = round(100 / $storageCoefficient, 2);
        } else {
            $storageUsed = 0;
        }

        return $storageUsed;
    }

    /**
     * Get Folder class
     *
     * @return \App\Actions\Storage\Folder\FolderInterface
     */
    public static function folder(): FolderInterface
    {
        return new Folder();
    }
}