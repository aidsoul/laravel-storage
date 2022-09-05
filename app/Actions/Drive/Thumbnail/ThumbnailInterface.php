<?php 

namespace App\Actions\Drive\Thumbnail;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

interface ThumbnailInterface 
{
    /**
     * @param string $id
     * 
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function get(string $id): BinaryFileResponse;
}
