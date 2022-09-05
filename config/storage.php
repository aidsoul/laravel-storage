<?php

return
    [
        /**
         * Megabyte
         */
        'max_size' => env('STORAGE_MAX_SIZE', '9999'),

        /**
         * Kilobyte 
         */
        'max_file_size' => env('STORAGE_MAX_FILE_SIZE', '10240'),

        /**
         * Megabyte
         */
        'default_user_size' => env('STORAGE_DEFAULT_USER_SIZE', '100'),

        /**
         * Encrypt salt
         */
        'file_encrypt' => env('STORAGE_FILE_ENCRYPT', 'rR2~5%gvDmwyk'),

        /**
         * Lifetime of a public link in minutes
         */
        'file_link_lifetime' => env('STORAGE_FILE_LINK_LIFETIME', '1')
    ];
