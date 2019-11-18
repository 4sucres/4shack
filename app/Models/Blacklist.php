<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    protected $table = 'blacklist_entries';

    const TYPE_IP_ADDRESS = 1;
    const TYPE_CHECKSUM = 2;

    public static function hasIpAddress($value)
    {
        return self::query()
            ->where('type', self::TYPE_IP_ADDRESS)
            ->where('value', $value)
            ->count() > 0;
    }

    public static function hasChecksum($value)
    {
        return self::query()
            ->where('type', self::TYPE_CHECKSUM)
            ->where('value', $value)
            ->count() > 0;
    }
}
