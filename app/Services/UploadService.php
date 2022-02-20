<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadService
{
    public function saveFile(UploadedFile $file): string
    {
        $status = $file->storeAs('catalogs', $file->hashName(), 'public');
        if(!$status){
            throw new \Exception('Файл не загружен');
        }
        return $status;
    }
}
