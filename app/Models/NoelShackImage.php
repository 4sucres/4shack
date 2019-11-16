<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoelShackImage extends Model
{
    protected $table = "noelshack_images";
    protected $guarded = [];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
