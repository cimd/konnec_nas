<?php

namespace App\Models\Photo;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exif extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $guarded = ['created_at', 'updated_at'];
    // protected $fillable = [
    //     'DateTimeOriginal',
    //     'FileName',
    //     'FileType',
    //     'Make',
    //     'Model',
    //     'Rating',
    //     'XPSubject',
    //     'XPTitle',
    //     'XPKeywords'
    // ];

    protected $casts = [
        'Rating' => 'integer',
    ];

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
