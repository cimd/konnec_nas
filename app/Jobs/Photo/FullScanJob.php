<?php

namespace App\Jobs\PHoto;

use App\Models\Photo\Exif;
use App\Models\Photo\Photo;
use App\Services\Photo\ExifTool;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FullScanJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        Photo::chunk(200, function ($photos) {
            foreach ($photos as $photo) {
                // echo($photo . PHP_EOL);
                $photoExif = ExifTool::photo($photo)->tags();
                $exif = Exif::updateOrCreate(
                    ['photo_id' => $photo->id],
                    [
                        'ApertureValue' => $photoExif['aperturevalue'],
                        'BrightnessValue' => $photoExif['brightnessvalue'],
                        // 'ColorSpace' => $photoExif['ColorSpace'],
                        // 'ComponentsConfiguration' => $photoExif['ComponentsConfiguration'],
                        // 'Comment' => $photoExif['Comment'],
                        // 'COMPUTED' => $photoExif['COMPUTED'],
                        // 'Contrast' => $photoExif['Contrast'],
                        // 'CustomRendered' => $photoExif['CustomRendered'],
                        // 'DateTime' => $photoExif['DateTime'],
                        // 'DateTimeDigitized' => $photoExif['DateTimeDigitized'],
                        'DateTimeOriginal' => $photoExif['datetimeoriginal'],
                        // 'DigitalZoomRatio' => $photoExif['DigitalZoomRatio'],
                        // 'Exif_IFD_Pointer' => $photoExif['Exif_IFD_Pointer'],
                        'ExifImageLength' => $photoExif['exifimagelength'],
                        'ExifImageWidth' => $photoExif['exifimagewidth'],
                        // 'ExifVersion' => $photoExif['ExifVersion'],
                        // 'ExposureBiasValue' => $photoExif['ExposureBiasValue'],
                        // 'ExposureMode' => $photoExif['ExposureMode'],
                        // 'ExposureProgram' => $photoExif['ExposureProgram'],
                        // 'ExposureTime' => $photoExif['ExposureTime'],
                        'FileDateTime' => $photoExif['filedatetime'],
                        'FileName' => $photoExif['filename'],
                        'FileSize' => $photoExif['filesize'],
                        'FileType' => $photoExif['filetype'],
                        // 'Flash' => $photoExif['Flash'],
                        // 'FlashPixVersion' => $photoExif['FlashPixVersion'],
                        // 'FNumber' => $photoExif['FNumber'],
                        'FocalLength' => $photoExif['focallength'],
                        'FocalLengthIn35mmFilm' => $photoExif['focallengthin35mmfilm'],
                        // 'GPS_IFD_Pointer' => $photoExif['GPS_IFD_Pointer'],
                        // 'ImageLength' => $photoExif['ImageLength'],
                        // 'ImageWidth' => $photoExif['ImageWidth'],
                        // 'InterOperabilityIndex' => $photoExif['InterOperabilityIndex'],
                        // 'InteroperabilityOffset' => $photoExif['InteroperabilityOffset'],
                        // 'InterOperabilityVersion' => $photoExif['InterOperabilityVersion'],
                        'IsoSpeedRatings' => $photoExif['isospeedratings'],
                        'Make' => $photoExif['make'],
                        // 'MaxApertureValue' => $photoExif['MaxApertureValue'],
                        // 'MeteringMode' => $photoExif['MeteringMode'],
                        // 'MimeType' => $photoExif['MimeType'],
                        'Model' => $photoExif['model'],
                        'Orientation' => $photoExif['orientation'],
                        'Rating' => $photoExif['rating'],
                        // 'ResolutionUnit' => $photoExif['ResolutionUnit'],
                        // 'Saturation' => $photoExif['Saturation'],
                        // 'SceneCaptureType' => $photoExif['SceneCaptureType'],
                        // 'SceneType' => $photoExif['SceneType'],
                        // 'SectionsFound' => $photoExif['SectionsFound'],
                        // 'SensingMethod' => $photoExif['SensingMethod'],
                        // 'Sharpness' => $photoExif['Sharpness'],
                        'ShutterSpeedValue' => $photoExif['shutterspeedvalue'],
                        // 'Software' => $photoExif['Software'],
                        // 'SubjectDistance' => $photoExif['SubjectDistance'],
                        // 'SubjectDistanceRange' => $photoExif['SubjectDistanceRange'],
                        // 'SubSecTime' => $photoExif['SubSecTime'],
                        // 'SubSecTimeDigitized' => $photoExif['SubSecTimeDigitized'],
                        // 'SubSecTimeOriginal' => $photoExif['SubSecTimeOriginal'],
                        // 'UndefinedTag:0x9010' => $photoExif['UndefinedTag:0x9010'],
                        // 'UndefinedTag:0x9011' => $photoExif['UndefinedTag:0x9011'],
                        // 'UndefinedTag:0x9012' => $photoExif['UndefinedTag:0x9012'],
                        // 'WhiteBalance' => $photoExif['WhiteBalance'],
                        'XPComment' => $photoExif['xpcomment'],
                        'XPSubject' => $photoExif['xpsubject'],
                        'XPTitle' => $photoExif['xptitle'],
                        'XPKeywords' => $photoExif['xpkeywords'],
                        // 'XResolution' => $photoExif['XResolution'],
                        // 'YCbCrPositioning' => $photoExif['YCbCrPositioning'],
                        // 'YResolution' => $photoExif['YResolution'],
                    ]
                );
            }
        });
    }
}
