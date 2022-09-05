<?php 

namespace App\Actions\Drive\Download;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

interface DownloadInterface
{
    public function run(Request $request, string $id): bool|StreamedResponse;
}