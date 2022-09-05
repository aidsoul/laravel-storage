<?php

namespace App\Actions\Storage\File\Download;

use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Download class interface
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
interface DownloadInterface
{
    /**
     * @param string $id
     * @return integer|\Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function run(string $id): int|StreamedResponse;
}
