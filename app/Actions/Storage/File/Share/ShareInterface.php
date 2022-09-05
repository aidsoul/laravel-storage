<?php

namespace App\Actions\Storage\File\Share;

interface ShareInterface
{
    /**
     * @param string $id
     * @return array
     */
    public function run(string $id): array;
}
