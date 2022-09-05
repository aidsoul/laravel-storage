<?php

namespace App\Actions\Crypt;

use App\Actions\Crypt\Decryption\Decryption;
use App\Actions\Crypt\Decryption\DecryptionInterface;
use App\Actions\Crypt\Encryption\Encryption;
use App\Actions\Crypt\Encryption\EncryptionInterface;

/**
 * Crypt class
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
interface CryptInterface
{
    /**
     * Encrypt the string
     *
     * @return \App\Actions\Crypt\Encryption\EncryptionInterface
     */
    public static function encrypt(): EncryptionInterface;

    /**
     * Decrypt the string
     *
     * @return \App\Actions\Crypt\Decryption\DecryptionInterface
     */
    public static function decrypt(): DecryptionInterface;
}
