<?php

namespace App\Http\Controllers\Imagehandler;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function deleteUnusedImagesForm()
    {
        return view('admin.Imagehandler.delete-unused-images');
    }

    public function deleteUnusedImages($oldImagesObj, $newImagesObj)
    {
        $oldImages = $this->getTinymceImages($oldImagesObj);
        $updatedImages = $this->getTinymceImages($newImagesObj);

        $unusedImages = array_diff($oldImages, $updatedImages);
        $this->deleteImage($unusedImages);
    }

    private function deleteImage($imageUrls)
    {
        foreach ($imageUrls as $delFile) {
            Storage::delete('public/uploads/' . basename($delFile));
        }
    }

    private function getTinymceImages($content)
    {
        $pattern = '/src="([^"]*)"/i';
        preg_match_all($pattern, $content, $matches);
        return $matches[1];
    }

    public function fixTinymceImageUrl($tinymce){
        $pattern = '/<img[^>]+src="([^">]+)"/';

        return preg_replace_callback($pattern, function ($matches) {
            $urltest = $matches[1];
            $modifiedUrl = '/..' . $urltest;
            return str_replace($urltest, $modifiedUrl, $matches[0]);
        }, $tinymce);
    }
}
