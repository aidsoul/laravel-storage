<?php

namespace App\Actions\Storage\File\Upload;

use App\Actions\Helper\FileHelper;
use App\Actions\Sibling;
use App\Http\Requests\Storage\FileRequest;
use App\Models\FileModel;
use App\Models\FolderFileModel;
use App\Models\FolderModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

/**
 * Upload file in user drive
 * 
 * @license MIT
 * @author aidsoul <work-aidsoul@outlook.com>
 */
class Upload implements UploadInterface
{
    /**
     * @var \Illuminate\Support\Facades\Auth
     */
    private object $user;

    /**
     * @var \App\Http\Requests\Storage\FileRequest
     */
    private object $file;

    /**
     * @var array
     */
    private array $message;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Collect and Upload File
     *
     * @param \App\Http\Requests\Storage\FileRequest $request
     * 
     * @return void
     */
    public function collectAndUpload(FileRequest $request): void
    {
        $request->validated();
        if ($request->hasFile('fileUpload')) {

            $storageSizeUsed = $this->user->storage_size_used;
            $storageSize = $this->user->storage_size;

            // If there is more disk space
            if ($storageSizeUsed <= $storageSize) {

                $this->file = $request->file('fileUpload');

                // File size in megabytes
                $fileSize = number_format($this->file->getSize() / 1048576, 3);

                // The storage size allows you to fit the file
                if ($storageSizeUsed + $fileSize <= $storageSize) {
                    $folderId = base64_decode($request->folderId);
                    $folder = FolderModel::find($folderId);
                    if ($folder->user_id == $this->user->id) {
                        //File name
                        $fileName = pathinfo($this->file->getClientOriginalName(), PATHINFO_FILENAME);
                        // if (empty($fileName)) $fileName = fake()->word();

                        // Encrypted file name
                        $encryptedFileName = md5($fileName) . Str::random(13);

                        //File extension
                        $fileExtention = $this->file->getClientOriginalExtension();

                        // Upload file in to user drive
                        $filePath = $this->uploadFile(Sibling::get($folder, $folderId), $encryptedFileName);

                        // Add a file to the database
                        $fileId = $this->AddFileInDatabase(
                            $fileName,
                            $encryptedFileName,
                            $fileExtention,
                            $fileSize
                        );

                        // Creating a thumbnail for an image
                        $this->createThumbnail($filePath, $fileExtention, $fileId);

                        // Link a file to a folder
                        $this->AddingFileToFolder($folder->id, $fileId);

                        // User update
                        $this->userStorageUpdate($fileSize);

                        $this->message = ['fileMessageSuccess', 'Файл успешно загружен'];
                    } else {
                        $this->message = ['fileMessageDanger', 'Папка вам не принадлежит'];
                    }
                } else {
                    $this->message = ['fileMessageDanger', 'Загружаемый файл слишком велик и не поместится на записываемый диск'];
                }
            } else {
                $this->message = ['fileMessageDanger', 'Недостаточно памяти вашего диска для загрузки файла!'];
            }
        }
    }

    /**
     * Uploading a file to disk
     *
     * @param string $encryptedFileName
     * 
     * @return string
     */
    private function uploadFile(string $filePath = '', string $encryptedFileName): string
    {
        return $this->file->storeAs($filePath, $encryptedFileName);
    }

    /**
     * Add a file to the database
     *
     * @param string $fileName
     * @param string $encryptedFileName
     * @param string $fileExtention
     * @param int|float $size
     * 
     * @return int
     */
    private function AddFileInDatabase(
        string $fileName,
        string $encryptedFileName,
        string $fileExtention,
        int|float $size
    ): int {
        return FileModel::create([
            'name' => $fileName,
            'encrypted_name' => $encryptedFileName,
            'extension' => $fileExtention,
            'size' => $size,
        ])->id;
    }

    /**
     * Adding a file to a folder
     *
     * @param integer $folderId
     * @param integer $fileId
     * 
     * @return void
     */
    private function AddingFileToFolder(int $folderId, int $fileId): void
    {
        FolderFileModel::create([
            'folder_id' => $folderId,
            'file_id' => $fileId
        ]);
    }

    /**
     * Update the size of the used user storage
     *
     * @param int|float $size
     * 
     * @return void
     */
    private function userStorageUpdate(int|float $size): void
    {
        $user = UserModel::find($this->user->id);
        $user->update(
            ['storage_size_used' => $user->storage_size_used + $size]
        );
    }

    /**
     * Creating thumbnails for an image
     *
     * @param string $filePath
     * @param string $fileExtention
     * 
     * @return void
     */
    private function createThumbnail(string $filePath, string $fileExtention, int $fileId): void
    {
        $imageExtensions = ['jpg', 'png', 'jpeg'];
        if (in_array($this->file->extension(), $imageExtensions)) {
            $path = FileHelper::get()->thumbnailPath();
            $basePath = Storage::path($path);
            if (!Storage::disk('private')->exists($path)) {
                Storage::makeDirectory($path);
            }
            
            $thumbnail = Image::make(Storage::get($filePath));
            $thumbnail->resize(150, 150);
            $thumbnail->save($basePath .
                base64_encode($fileId) . '.' . $fileExtention, 100);
        }
    }

    /**
     * Return message
     *
     * @return array
     */
    public function getMessage(): array
    {
        return $this->message;
    }
}
