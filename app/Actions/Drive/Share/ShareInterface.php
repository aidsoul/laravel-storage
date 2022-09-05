<?php 

namespace App\Actions\Drive\Share;

use Illuminate\Http\Request;

interface ShareInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * 
     * @return array
     */
    public function open(Request $request, string $id): array;
}