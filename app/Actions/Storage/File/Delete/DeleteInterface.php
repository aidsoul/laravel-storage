<?php

namespace App\Actions\Storage\File\Delete;

/**
 * Delete class interface
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
interface DeleteInterface
{
    /**
     * @param string $id
     * 
     * @return integer
     */
    public function run(string $id): int;
}