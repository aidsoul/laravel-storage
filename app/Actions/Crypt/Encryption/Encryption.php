<?php 

namespace App\Actions\Crypt\Encryption;

/**
 * Crypt class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Encryption implements EncryptionInterface
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
        for ($i = 0; $i < strlen($str); $i++) {
            $char = substr($str, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result .= $char;
        }

        return base64_encode($result);
    }

}
