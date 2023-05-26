<?php

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use SoftDeletes;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exifs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('photo_id')->index();
            $table->text('ApertureValue')->nullable();
            $table->text('BrightnessValue')->nullable();
            // $table->smallInteger('ColorSpace')->nullable();
            // $table->text('ComponentsConfiguration')->nullable();
            // $table->text('Comment')->nullable();
            // $table->text('COMPUTED')->nullable();
            // $table->text('Contrast')->nullable();
            // $table->smallInteger('CustomRendered')->nullable();
            // $table->timestamp('DateTime')->nullable();
            // $table->timestamp('DateTimeDigitized')->nullable();
            $table->timestamp('DateTimeOriginal')->nullable();
            // $table->text('DigitalZoomRatio')->nullable();
            // $table->smallInteger('Exif_IFD_Pointer')->nullable();
            $table->smallInteger('ExifImageLength')->nullable();
            $table->smallInteger('ExifImageWidth')->nullable();
            // $table->text('ExifVersion')->nullable();
            // $table->text('ExposureBiasValue')->nullable();
            // $table->text('ExposureMode')->nullable();
            // $table->smallInteger('ExposureProgram')->nullable();
            // $table->text('ExposureTime')->nullable();
            $table->text('FileDateTime')->nullable();
            $table->text('FileName')->nullable();
            $table->text('FileSize')->nullable();
            $table->text('FileType')->nullable();
            // $table->smallInteger('Flash')->nullable();
            // $table->text('FlashPixVersion')->nullable();
            // $table->text('FNumber')->nullable();
            $table->text('FocalLength')->nullable();
            $table->smallInteger('FocalLengthIn35mmFilm')->nullable();
            // $table->text('GPS_IFD_Pointer')->nullable();
            // $table->integer('ImageLength')->nullable();
            // $table->integer('ImageWidth')->nullable();
            // $table->text('InterOperabilityIndex')->nullable();
            // $table->integer('InteroperabilityOffset')->nullable();
            // $table->text('InterOperabilityVersion')->nullable();
            $table->smallInteger('IsoSpeedRatings')->nullable();
            $table->text('Make')->nullable();
            // $table->text('MaxApertureValue')->nullable();
            // $table->smallInteger('MeteringMode')->nullable();
            // $table->text('MimeType')->nullable();
            $table->text('Model')->nullable();
            $table->smallInteger('Orientation')->nullable();
            $table->smallInteger('Rating')->nullable();
            // $table->smallInteger('ResolutionUnit')->nullable();
            // $table->text('Saturation')->nullable();
            // $table->text('SceneCaptureType')->nullable();
            // $table->text('SceneType')->nullable();
            // $table->text('SectionsFound')->nullable();
            // $table->smallInteger('SensingMethod')->nullable();
            // // $table->text('Sharpness')->nullable();
            $table->text('ShutterSpeedValue')->nullable();
            // $table->text('Software')->nullable();
            // $table->text('SubjectDistance')->nullable();
            // $table->text('SubjectDistanceRange')->nullable();
            // $table->integer('SubSecTime')->nullable();
            // $table->integer('SubSecTimeDigitized')->nullable();
            // $table->integer('SubSecTimeOriginal')->nullable();
            // $table->text('UndefinedTag:0x9010')->nullable();
            // $table->text('UndefinedTag:0x9011')->nullable();
            // $table->text('UndefinedTag:0x9012')->nullable();
            // $table->text('WhiteBalance')->nullable();
            $table->text('XPComment')->nullable();
            $table->text('XPSubject')->nullable();
            $table->text('XPTitle')->nullable();
            $table->text('XPKeywords')->nullable();
            $table->text('XResolution')->nullable();
            // $table->text('YCbCrPositioning')->nullable();
            // $table->text('YResolution')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exif');
    }
};
