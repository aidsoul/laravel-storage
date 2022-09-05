<?php

namespace App\Actions\Storage\File\Select;

/**
 * Select class interface
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
interface SelectInterface
{
    /**
     * @param string $id
     * @return object|boolean
     */
    public function run(string $id): object|bool;
}