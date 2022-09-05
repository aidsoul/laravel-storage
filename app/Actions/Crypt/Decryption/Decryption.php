<?php

namespace App\Actions\Crypt\Decryption;

/**
 * Decrypt class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Decryption implements DecryptionInterface
{

    /**
     * @param string $str
     * 
     * @return string
     */
    public function run(string $str): string
    {
        $result = '';
        $key = config('storage.file_encrypt');
        $string = base64_decode($str);
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result .= $char;
        }

        return $result;
    }
}
