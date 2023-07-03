<?php

namespace App\Models\Photo;

use App\Traits\Filterable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    // use HasFactory;
    use SoftDeletes, Filterable;

    protected $guarded = ['created_at', 'updated_at'];

    protected $casts = [
        'date_taken' => 'date',
    ];

    protected $appends = [
        'year',
        'month',
    ];

    public function exif()
    {
        return $this->hasOne(Exif::class);
    }

    public function getYearAttribute()
    {
        if ($this->date_taken) {
            $date = new Carbon($this->date_taken);

            return $date->year;
        }

        return null;
    }

        public function getMonthAttribute()
        {
            if ($this->date_taken) {
                $date = new Carbon($this->date_taken);

                return $date->month;
            }

            return null;
        }
}
