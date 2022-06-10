<?php
namespace App\Services;

use Illuminate\Support\Facades\File;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Image;

use FFMpeg;
// use FFMpeg\Filters\Video\VideoFilters;
// use FFMpeg\Filters\Video\ClipFilter;
// use FFMpeg\Coordinate\TimeCode;

class PhotoHandler {

  private static $path, $filepath, $filename, $photo, $newPath, $mimeType;

  public function __construct() {}

  public static function path($path) {
    switch (PHP_OS) {
      case 'Linux':
        self::$path = str_replace(storage_path().'/app/', '', File::dirname($path)) . '/';
        break;
      case 'WINNT':
        self::$path = str_replace(storage_path().'\app\\', '', File::dirname($path)) . '/';
        break;
      default:
        self::$path = PHP_OS;
        break;
    }
    // echo(self::$path . PHP_EOL);

    self::$filename = File::basename($path);
    // echo(self::$filename . PHP_EOL);

    self::$filepath = $path;
    // echo(self::$filepath . PHP_EOL);

    self::$mimeType = File::mimeType($path);

    return new self;
  }

  public static function photo(Photo $photo) {
      self::$photo = $photo;
      self::$filename = $photo->filename;
      self::$path = $photo->path;
      self::$filepath = $photo->filename . $photo->path;
      self::$mimeType = $photo->mime_type;
      return new self;
  }

  public static function import($scanTime = null) {
    if (!$scanTime) $scanTime = Carbon::now();

    // $mimeType = File::mimeType(self::$filepath);
    $fileData = array();
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

    $photo = Photo::updateOrCreate(
      [
        'path' =>  self::$path,
        'filename' => self::$filename
      ],
      [
        'sort_title' => File::name(self::$filepath),
        'size' => File::size(self::$filepath),
        'last_modified' => $lastModified,
        'last_scan' => $scanTime,
        'date_taken' => $dateTaken,
        'mime_type' => self::$mimeType
      ]
    );

    return new self;
  }

  public static function rename($path) {
    self::$newPath = $path;
    Storage::move(self::$photo->path, self::$newPath);
    return new self;
  }

  public static function createThumbnails ($forceRecreate = false) {
    if (str_contains(self::$mimeType, 'image')) {
      self::createSmallImageThumbnail($forceRecreate);
    } else {
      self::createSmallVideoThumbnail($forceRecreate);
    }
  }

  public static function createSmallImageThumbnail ($forceRecreate) {
    $smallThumbPath = 'thumbs_sm/';

    $thumbPath = self::$path . $smallThumbPath;
    $thumbFilePath = self::$path . $smallThumbPath . self::$filename;
    // echo($thumbPath . File::basename($filePath) . PHP_EOL);

    // Don't recreate existing thumbs
    if (!Storage::exists($thumbFilePath) || $forceRecreate){

      if(!Storage::exists($thumbPath)){
        // echo($thumbPath . PHP_EOL);
        Storage::makeDirectory($thumbPath);
      }

      $thumb = Image::make(self::$filepath);
      $thumb->resize(null, 180, function ($constraint) {
        $constraint->aspectRatio();
        // $constraint->upsize();
      });

      $thumb->orientate()->save(Storage::path($thumbFilePath), 60);
    }
  }

  public static function createSmallVideoThumbnail ($forceRecreate) {
    // echo ('Video' . PHP_EOL);
    $smallThumbPath = 'thumbs_sm/';

    $thumbPath = self::$path . $smallThumbPath;
    $thumbFilePath = substr(self::$path . $smallThumbPath . self::$filename, 0, -3) . 'jpg';

    // Don't recreate existing thumbs
    if (!Storage::exists($thumbFilePath) || $forceRecreate){

      if(!Storage::exists($thumbPath)){
        Storage::makeDirectory($thumbPath);
      }

      // echo (self::$filepath . PHP_EOL);
      // echo ($thumbFilePath . PHP_EOL);
      // echo (self::$filename . PHP_EOL);
      // echo (self::$path . PHP_EOL);

      FFMpeg::open(self::$path . self::$filename)
              ->getFrameFromSeconds(1)
              ->export()
              ->save($thumbFilePath);
    }
  }

  private function updateModel() {
    self::$photo->path = self::$newPath;
    self::$photo->filename = $this->newFilename;
    self::$photo->save();
    return new self;
  }
}