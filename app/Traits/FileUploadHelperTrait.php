<?php 
namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileUploadHelperTrait 
{
    public function fileUploader(object $file, string $folder) : string
    {
        $filehash = explode('.', $file->hashName())[0];
        $ext = $file->getClientOriginalExtension();
        return $file->storeAs($folder, $filehash . '.'. $ext);
    }

    public function removeFromStorage(string $path) : void
    {
        if(!$path) return;
        
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }
}
