<?php

namespace App\Models\Photo;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimelineGallery extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $guarded = ['created_at', 'updated_at'];

    public function exif()
    {
        return $this->hasOne(Exif::class);
    }

    public function scopeFilter($query, $request)
    {
        // if( isset($request->filter['csel_headers_id']) ){
        //     $query->where('csel_headers_id', $request->filter['csel_headers_id']);
        // }
        return $query;
    }
}
