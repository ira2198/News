<?php


namespace App\Services;

use App\Services\Contracts\Upload;
use Exception;
use Illuminate\Http\UploadedFile;

class UploadServise implements Upload
{
    public function addFile(UploadedFile $uploadedFile): string
    {  //dd($uploadedFile);
        $path = $uploadedFile->storeAs('news_images', $uploadedFile->hashName(), 'public');
        
           if ($path === false) {
            throw new Exception('File was not upload');
        }
         return $path;
    }
}
