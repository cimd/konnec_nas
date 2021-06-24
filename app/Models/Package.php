<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = "pkg_packages";
    protected $guarded = ['created_at', 'updated_at'];

    protected $casts = [
        'category' => 'array'
    ];

}
