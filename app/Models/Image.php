<?php

namespace App\Models;

use Mtvs\EloquentHashids\HasHashid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes, HasHashid;

    protected $guarded = [];

    public function noelshack_image()
    {
        return $this->hasOne(NoelShackImage::class);
    }
}
