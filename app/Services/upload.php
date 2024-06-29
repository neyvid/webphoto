<?php
namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class UploadService{
    public static function uploadImage(UploadedFile $file){
        $fileExtension=$file->getClientOriginalExtension();
        $newNameGenerated=Carbon::now('Asia/Tehran')->format('Y-m-d').'_'.Str::random(40);
        $newFileName=$newNameGenerated.'.'.$fileExtension;
        $newFile=$file->move(config('upload.path'),$newFileName);
        return [
            'size'=>$newFile->getSize(),
            'name'=>$newFileName
        ];
    }
}
?>
