<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    protected $table = 'cfg_scripts';

    protected $guarded = ['created_at', 'updated_at'];
}
