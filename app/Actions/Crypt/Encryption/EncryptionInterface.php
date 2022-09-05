<?php 

namespace App\Actions\Crypt\Encryption;


interface EncryptionInterface
{
    /**
     * @param string $str
     * 
     * @return string
     */
    public function run(string $str): string;
    
}