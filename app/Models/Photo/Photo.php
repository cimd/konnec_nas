<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Photo extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $guarded = ['created_at', 'updated_at'];
    protected $casts = [
        'date_taken' => 'date',
    ];
    protected $appends = [
        'year',
        'month'
    ];

    public function exif() {
        return $this->hasOne(Exif::class);
    }

    public function scopeFilter($query, $request)
    {
        // if( isset($request->filter['csel_headers_id']) ){
        //     $query->where('csel_headers_id', $request->filter['csel_headers_id']);
        // }
        return $query;
    }

    public function getYearAttribute ()
    {
        if($this->date_taken) {
            $date = new Carbon($this->date_taken);
            return $date->year;
        }
        return null;
    }

        public function getMonthAttribute ()
    {
        if($this->date_taken) {
            $date = new Carbon($this->date_taken);
            return $date->month;
        }
        return null;
    }
}
