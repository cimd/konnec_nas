<?php

namespace App\Services\Photo;

use App\Models\Photo\Photo;
use Carbon\Carbon;
use FFMpeg;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

// use FFMpeg\Filters\Video\VideoFilters;
// use FFMpeg\Filters\Video\ClipFilter;
// use FFMpeg\Coordinate\TimeCode;

class PhotoHandler
{
    private static $path;

    private static $filepath;

    private static $filename;

    private static $photo;

    private static $newPath;

    private static $mimeType;

    public function __construct()
    {
    }

    public static function path($path)
    {
        self::$path = get_relative_path($path);
        // echo("path: " . self::$path . PHP_EOL);

        self::$filename = File::basename($path);
        // echo("filename: " . self::$filename . PHP_EOL);

        self::$filepath = $path;
        // echo("filepath: " . self::$filepath . PHP_EOL);

        self::$mimeType = File::mimeType($path);

        return new self;
    }

    public static function photo(Photo $photo)
    {
        self::$photo = $photo;
        self::$filename = $photo->filename;
        self::$path = $photo->path;
        self::$filepath = $photo->filename.$photo->path;
        self::$mimeType = $photo->mime_type;

        return new self;
    }

    public static function import($scanTime = null)
    {
        if (! $scanTime) {
            $scanTime = Carbon::now();
        }

        // $mimeType = File::mimeType(self::$filepath);
        $fileData = [];
        // $year = null;
        // $month = null;
        // $yearMonth = null;
        if (str_contains(self::$mimeType, 'image')) {
            $img = Image::make(self::$filepath);
            $dateTaken = null;
            if ($img->exif('DateTimeOriginal')) {
                $dateTaken = new Carbon($img->exif('DateTimeOriginal'));
            }
            $lastModified = new Carbon(File::lastModified(self::$filepath));
        } else {
            $lastModified = new Carbon(File::lastModified(self::$filepath));
            $dateTaken = $lastModified;
        }
        $year = Carbon::parse($dateTaken)->year;
        $month = Carbon::parse($dateTaken)->month;
        $yearMonth = $year.'/'.$month;

        $photo = Photo::updateOrCreate(
            [
                'path' => self::$path,
                'filename' => self::$filename,
            ],
            [
                'sort_title' => File::name(self::$filepath),
                'size' => File::size(self::$filepath),
                'last_modified' => $lastModified,
                'last_scan' => $scanTime,
                'date_taken' => $dateTaken,
                'mime_type' => self::$mimeType,
                'url' => '/photos/'.self::$path.'/'.self::$filename,
                'thumbnail_url' => '/photos/'.self::$path.'/thumbs_sm/'.self::$filename,
                'year' => $year,
                'month' => $month,
                'year_month' => $yearMonth,
            ]
        );

        return new self;
    }

    public static function rename($path)
    {
        self::$newPath = $path;
        Storage::move(self::$photo->path, self::$newPath);

        return new self;
    }

    public static function createThumbnails($forceRecreate = false)
    {
        if (str_contains(self::$mimeType, 'image')) {
            self::createSmallImageThumbnail($forceRecreate);
        } else {
            //   self::createSmallVideoThumbnail($forceRecreate);
        }
    }

    public static function createSmallImageThumbnail($forceRecreate)
    {
        $smallThumbPath = 'thumbs_sm/';

        $thumbPath = self::$path.DIRECTORY_SEPARATOR.$smallThumbPath;
        $thumbFilePath = self::$path.DIRECTORY_SEPARATOR.$smallThumbPath.self::$filename;
        // echo($thumbPath . File::basename($filePath) . PHP_EOL);

        // Don't recreate existing thumbs
        if (! Storage::disk('photos')->exists($thumbFilePath) || $forceRecreate) {
            if (! Storage::disk('photos')->exists($thumbPath)) {
                // echo($thumbPath . PHP_EOL);
                Storage::disk('photos')->makeDirectory($thumbPath);
            }

            $thumb = Image::make(self::$filepath);
            $thumb->resize(null, 180, function ($constraint) {
                $constraint->aspectRatio();
                // $constraint->upsize();
            });

            $thumb->orientate()->save(Storage::disk('photos')->path($thumbFilePath), 60);
        }
    }

    public static function createSmallVideoThumbnail($forceRecreate)
    {
        echo 'Video'.PHP_EOL;
        $smallThumbPath = 'thumbs_sm/';

        $thumbPath = self::$path.DIRECTORY_SEPARATOR.$smallThumbPath;
        echo 'thumbPath: '.$thumbPath.PHP_EOL;
        $thumbFilePath = substr(self::$path.DIRECTORY_SEPARATOR.$smallThumbPath.self::$filename, 0, -3).'jpg';
        echo 'thumbFilePath: '.$thumbFilePath.PHP_EOL;

        // Don't recreate existing thumbs
        if (! Storage::disk('photos')->exists($thumbFilePath) || $forceRecreate) {
            echo 'Dont recreate'.PHP_EOL;
            if (! Storage::disk('photos')->exists($thumbPath)) {
                echo 'Dont exists'.PHP_EOL;
                Storage::disk('photos')->makeDirectory($thumbPath);
            }

            // echo (self::$filepath . PHP_EOL);
            // echo ($thumbFilePath . PHP_EOL);
            // echo (self::$filename . PHP_EOL);
            // echo (self::$path . PHP_EOL);
            $path = Storage::disk('photos')->path(self::$path.DIRECTORY_SEPARATOR.self::$filename);
            echo 'path: '.$path.PHP_EOL;

            FFMpeg::open($path)
                ->getFrameFromSeconds(1)
                ->export()
                ->save($thumbFilePath);
        }
    }

    private function updateModel()
    {
        self::$photo->path = self::$newPath;
        self::$photo->filename = $this->newFilename;
        self::$photo->save();

        return new self;
    }
}
