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

    public function deleteUnusedImages()
    {
        $ImgArr1 = [];
        $ImgArr2 = [];
        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        foreach ($tables as $table) {
            if (Schema::hasColumn($table, 'photo')) {
                $urls = DB::table($table)->pluck('photo')->toArray();
                foreach ($urls as $imageData) {
                    $ImgArr1[] = basename($imageData);
                }
            } elseif (Schema::hasColumn($table, 'fulltext')) {
                $urls = DB::table($table)->pluck('fulltext')->toArray();

                foreach ($urls as $imageData) {
                    preg_match_all('/src="([^"]*)"/i', $imageData, $matches);

                    foreach ($matches as $urls) {
                        foreach ($urls as $url) {
                            $imageNames = basename($url);
                            $ImgArr2[] = $imageNames;
                        }
                    }
                }
            }
        }
        $existingFileArr = [];
        $existingFiles = Storage::files('public/uploads');

        foreach ($existingFiles as $existingFile) {
            $existingFileArr[] = basename($existingFile);
        }

        $filenames = array_merge($ImgArr1, $ImgArr2);
        $differences = array_diff($existingFileArr, $filenames);

        $counter = 0;
        foreach ($differences as $delFile) {
            Storage::delete('public/uploads/' . $delFile);
            $counter++;
        }

        // if ($counter > 1){
        //     return redirect()->back()->withSuccess($counter . ' Afbeeldingen zijn succesvol verwijderd!');
        // } elseif ($counter == 1) {
        //     return redirect()->back()->withSuccess($counter . ' Afbeelding succesvol verwijderd!');
        // } else {
        //     return redirect()->back()->withSuccess('Er zijn geen afbeeldingen meer om te verwijderen!');
        // }
    }

    public function fixTinymceImageUrl($tinymce){
        // Regular expression pattern to match image tags and extract the src attribute
        $pattern = '/<img[^>]+src="([^">]+)"/';

        // Callback function to replace the URLs within the image tags
        return preg_replace_callback($pattern, function ($matches) {
            $urltest = $matches[1];
            $modifiedUrl = '/..' . $urltest; // Add "/.." before the URL
            return str_replace($urltest, $modifiedUrl, $matches[0]); // Replace the URL in the image tag
        }, $tinymce);
    }
}
