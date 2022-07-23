<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;
    protected $table = "pkg_packages";
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'category' => 'array',
        'has_config' => 'boolean',
        'can_remove' => 'boolean'
    ];

    public function scopePackage($query, $name)
    {
        $query->where('name', $name);
        return $query;
    }

    public function install($query, $version)
    {
        $result = $query->first();
        $result->installed_version = $version;
        $result->save();
        return $result;
    }

    public function remove($query)
    {
        $result = $query->first();
        $result->installed_version = null;
        $result->save();
        return $result;
    }

    public function dependency()
    {
        return $this->hasOne(PackageDependency::class, 'id', 'package_id');
    }
}
