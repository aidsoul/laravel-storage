# Online Storage
It is a simple online file repository.
Developed using the Laravel open source framework.
The nested set model was used to form the folder tree.

Available options:
 - Only users who have confirmed their email have access to the repository;
 - It is possible to recover the password;
 - The user can upload any files, rename them, delete them, and download them;
 - The user can also create folders of unlimited nesting;
 - Thumbnails should be displayed for images;
 - When any file is selected, the user can share it. As a result, he will get a public link. When you click on this link, you can see information about the file and a direct link to download it. The direct link must be valid for a limited time;
 - When this limit is reached, the ability to upload new files is blocked until any existing files are deleted;
 - The maximum size of each downloaded file is also limited;
 - Role separation;
 - Assigning another user as an administrator;
 - User account blocking;
 - Changing the size of the user storage;
 - On the disk, the files are located in the user's folder and have names as a unique identifier without an extension.

# Installing
You need:
 - apache2; 
 - php >=8.0; 
 - MySQL.

To install, use the command: `git clone https://github.com/aidsoul/laravel-storage`. Download the necessary libraries using the command: `composer install`.
Or use command `composer create-project aidsoul/laravel-storage`.


> **Note that the first registered user becomes an administrator**.


## Environment variables

**You can add the following variablesto the [.evn] configuration file .**

> It is recommended to set a value for each variable in the table below.

| # | Description |Set in|
|--|--|--|
| STORAGE_MAX_SIZE | Maximum possible size of user and administrator storage | Megabytes|
| STORAGE_MAX_FILE_SIZE| Maximum possible size of the file uploaded by the user|Kilobytes|
| STORAGE_DEFAULT_USER_SIZE| Standard user storage size  | Megabyte |
| STORAGE_FILE_ENCRYPT|  The salt line for encrypting public links|Random string |
|STORAGE_FILE_LINK_LIFETIME| The lifetime of a public link to a file |Minutes|

## Database

Set a value for the following environment variables:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
   
After on the command line, run the command: `php artisan migrate`.

## Email
Set a value for the following environment variables:

    MAIL_MAILER=smtp
    MAIL_HOST=mailhog
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=""
    MAIL_FROM_NAME="${APP_NAME}"

## Storage
To navigate to a folder, you need to click on it twice.

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
