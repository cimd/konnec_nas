<?php

namespace App\Services\Photo;

use App\Models\Photo\Photo;
use Illuminate\Support\Facades\Storage;

class ExifTool
{
    private static $photo;

    private static $exifToolParams;

    protected static $readTags;

    protected static $editTags;

    public function __construct()
    {
    }

    public static function photo(Photo $photo)
    {
        self::$photo = $photo;

        return new self;
    }

    public static function tags()
    {
        // self::$photo = $photo;
        // Default tags for reading
        $defaultTags = [
            'aperturevalue',
            'brightnessvalue',
            'datetimeoriginal',
            'exifimagelength',
            'exifimagewidth',
            'exposuretime',
            'filedatetime',
            'filename',
            'filesize',
            'filetype',
            'focallength',
            'focallengthin35mmfilm',
            'isospeedratings',
            'make',
            'model',
            'orientation',
            'rating',
            'shutterspeedvalue',
            'sectionsfound',
            'xpcomment',
            'xpkeywords',
            'xpsubject',
            'xptitle',
        ];

        // Set default reading params
        $params = null;
        foreach ($defaultTags as $tag) {
            $params .= " -{$tag}";
        }
        // echo($params . PHP_EOL);

        // Run Exif Tool
        $photoPath = Storage::disk('photos')->path(self::$photo->path.DIRECTORY_SEPARATOR.self::$photo->filename);
        $rawResult = shell_exec("exiftool -T {$params} {$photoPath}");
        // echo($rawResult . PHP_EOL);

        // Convert String to Array
        $explodedStr = preg_split('/\t+/', $rawResult);
        $result = [];
        $counter = 0;
        foreach ($defaultTags as $tag) {
            $result[$tag] = $explodedStr[$counter];
            if ($result[$tag] == '-') {
                $result[$tag] = null;
            }
            $counter++;
        }
        // echo($result['filesize'] . PHP_EOL);
        return $result;
    }

    // public static function edit(Photo $photo)
    // {
    //     self::$photo = $photo;
    //     return new self;

    // }

    public static function edit($tags)
    {
        foreach ($tags as $key => $value) {
            self::$exifToolParams .= " -{$key}={$value}";
        }
        // echo(self::$photo->path . PHP_EOL);
        return new self;
    }

    public static function save()
    {
        // Edit photo
        // echo(self::$exifToolParams . PHP_EOL);
        $edit = shell_exec("exiftool {$self::$exifToolParams} {$self::$photo->path}");
        // Delete Originals
        // $path = str_replace(self::$photo->filename, '', self::$photo->path);
        // echo($path . PHP_EOL);
        // $delete = shell_exec("exiftool -r -q -delete_original! {$path}");
        // return new self;
    }

    public static function deleteOriginals($path)
    {
        $result = shell_exec("exiftool -r -q -delete_original! {$path}");
    }
}
