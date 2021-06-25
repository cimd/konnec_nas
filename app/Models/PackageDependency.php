<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageDependency extends Model
{
    use SoftDeletes;
    protected $table = "pkg_packages";
    protected $guarded = ['created_at', 'updated_at'];
    protected $casts = [
        'dependencies' => 'array'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
}
