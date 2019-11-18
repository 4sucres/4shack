<?php

namespace App\Models;

use Mtvs\EloquentHashids\HasHashid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes, HasHashid;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($image) {
            $image->ip_address = request()->ip();
            $image->user_agent = request()->userAgent();
            return $image;
        });
    }

    public function noelshack_image()
    {
        return $this->hasOne(NoelShackImage::class);
    }
}
