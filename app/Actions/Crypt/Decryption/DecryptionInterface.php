<?php

namespace App\Actions\Crypt\Decryption;

interface DecryptionInterface
{
    /**
     * @param string $str
     * 
     * @return string
     */
    public function run(string $str): string;
}
