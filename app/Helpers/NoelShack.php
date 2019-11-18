<?php

namespace App\Helpers;

use Goutte\Client;
use App\Models\Image;
use Spatie\Regex\Regex;
use App\Models\NoelShackImage;
use Illuminate\Support\Facades\Storage;

class NoelShack
{
    const PATTERN_DASH = '-';
    const PATTERN_SLASH = '/';

    public static function retrieve($uri)
    {
        if (self::match($uri, self::PATTERN_DASH)) {
            // Passage par NoelShack pour retrouver le lien direct
            $client = new Client();
            $crawler = $client->request('GET', 'https://www.noelshack.com/' . $uri);
            $uri = str_replace(
                'https://image.noelshack.com/fichiers/',
                '',
                trim($crawler->filter('#elt_to_aff')->attr('src'))
            );
        }

        $fileName = str_replace('/', '-', $uri);

        try {
            $content = file_get_contents('https://image.noelshack.com/fichiers/' . $uri);
        } catch (\Throwable $th) {
            // File was not found :sad:
            return null;
        }

        if (Storage::put($fileName, $content, 'public')) {
            $image = Image::create([
                'name' => $fileName,
                'path' => $fileName,
                'size' => Storage::size($fileName),
                'checksum' => md5($content),
            ]);

            NoelShackImage::create([
                'url' => $uri,
                'image_id' => $image->id,
            ]);

            return $image;
        }

        return null;
    }

    public static function match($uri, $pattern = self::PATTERN_DASH, $bool = true)
    {
        /**
         * self::PATTERN_DASH
         * Type 1: noelshack.com/2016-38-1474567453-1472310080-picsart-08-27-12-36-12.png
         * Type 2: noelshack.com/2019-37-1-1567994655-photoeditor-20190909-040348985.jpg
         * self::PATTERN_SLASH
         * Type 1: image.noelshack.com/fichiers/2016/38/1474567453-1472310080-picsart-08-27-12-36-12.png
         * Type 2: image.noelshack.com/fichiers/2019/37/1/1567994655-photoeditor-20190909-040348985.jpg
         */

        $separator = '\\' . $pattern;
        $regex = '/(\d{4})' .
            $separator . '(\d{2})' .
            $separator . '(?:(\d*)' .
            $separator . '(?:(\d*)' .
            $separator . '|)|)((?:\w|' .
            $separator . ')*.\w*)/s';

        $match = Regex::match($regex, $uri);

        if ($bool) {
            return $match->hasMatch();
        } else {
            return $match;
        }
    }
}
