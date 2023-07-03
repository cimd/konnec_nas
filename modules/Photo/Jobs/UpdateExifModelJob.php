<?php

namespace App\Models\Jobs;

use App\Jobs\Exif;
use App\Services\ExifTool;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

// use Illuminate\Support\Facades\Artisan;

class UpdateExifModelJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $photo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $tags = ExifTool::photo($this->photo)->tags();
        $exif = Exif::updateOrCreate(
            ['photo_id' => $photo->id],
            [
                'ApertureValue' => $exif['ApertureValue'],
                'BrightnessValue' => $exif['BrightnessValue'],
                'ColorSpace' => $exif['ColorSpace'],
                'ComponentsConfiguration' => $exif['ComponentsConfiguration'],
                'Comment' => $exif['Comment'],
                'COMPUTED' => $exif['COMPUTED'],
                'Contrast' => $exif['Contrast'],
                'CustomRendered' => $exif['CustomRendered'],
                'DateTime' => $exif['DateTime'],
                'DateTimeDigitized' => $exif['DateTimeDigitized'],
                'DateTimeOriginal' => $exif['DateTimeOriginal'],
                'DigitalZoomRatio' => $exif['DigitalZoomRatio'],
                'Exif_IFD_Pointer' => $exif['Exif_IFD_Pointer'],
                'ExifImageLength' => $exif['ExifImageLength'],
                'ExifImageWidth' => $exif['ExifImageWidth'],
                'ExifVersion' => $exif['ExifVersion'],
                'ExposureBiasValue' => $exif['ExposureBiasValue'],
                'ExposureMode' => $exif['ExposureMode'],
                'ExposureProgram' => $exif['ExposureProgram'],
                'ExposureTime' => $exif['ExposureTime'],
                'FileDateTime' => $exif['FileDateTime'],
                'FileName' => $exif['FileName'],
                'FileSize' => $exif['FileSize'],
                'FileType' => $exif['FileType'],
                'Flash' => $exif['Flash'],
                'FlashPixVersion' => $exif['FlashPixVersion'],
                'FNumber' => $exif['FNumber'],
                'FocalLength' => $exif['FocalLength'],
                'FocalLengthIn35mmFilm' => $exif['FocalLengthIn35mmFilm'],
                'GPS_IFD_Pointer' => $exif['GPS_IFD_Pointer'],
                'ImageLength' => $exif['ImageLength'],
                'ImageWidth' => $exif['ImageWidth'],
                'InterOperabilityIndex' => $exif['InterOperabilityIndex'],
                'InteroperabilityOffset' => $exif['InteroperabilityOffset'],
                'InterOperabilityVersion' => $exif['InterOperabilityVersion'],
                'ISOSpeedRatings' => $exif['ISOSpeedRatings'],
                'Make' => $exif['Make'],
                'MaxApertureValue' => $exif['MaxApertureValue'],
                'MeteringMode' => $exif['MeteringMode'],
                'MimeType' => $exif['MimeType'],
                'Model' => $exif['Model'],
                'Orientation' => $exif['Orientation'],
                'Rating' => $exif['Rating'],
                'ResolutionUnit' => $exif['ResolutionUnit'],
                'Saturation' => $exif['Saturation'],
                'SceneCaptureType' => $exif['SceneCaptureType'],
                'SceneType' => $exif['SceneType'],
                'SectionsFound' => $exif['SectionsFound'],
                'SensingMethod' => $exif['SensingMethod'],
                'Sharpness' => $exif['Sharpness'],
                'ShutterSpeedValue' => $exif['ShutterSpeedValue'],
                'Software' => $exif['Software'],
                'SubjectDistance' => $exif['SubjectDistance'],
                'SubjectDistanceRange' => $exif['SubjectDistanceRange'],
                'SubSecTime' => $exif['SubSecTime'],
                'SubSecTimeDigitized' => $exif['SubSecTimeDigitized'],
                'SubSecTimeOriginal' => $exif['SubSecTimeOriginal'],
                'UndefinedTag:0x9010' => $exif['UndefinedTag:0x9010'],
                'UndefinedTag:0x9011' => $exif['UndefinedTag:0x9011'],
                'UndefinedTag:0x9012' => $exif['UndefinedTag:0x9012'],
                'WhiteBalance' => $exif['WhiteBalance'],
                'XPSubject' => $exif['XPSubject'],
                'XPTitle' => $exif['XPTitle'],
                'XPKeywords' => $exif['XPKeywords'],
                'XResolution' => $exif['XResolution'],
                'YCbCrPositioning' => $exif['YCbCrPositioning'],
                'YResolution' => $exif['YResolution'],
            ]
        );
    }
}
