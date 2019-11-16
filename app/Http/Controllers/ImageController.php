<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Spatie\Regex\Regex;
use Illuminate\Http\Request;
use App\Models\NoelShackImage;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function show($hashid)
    {
        /**
         * NoelShack Bridge, pour les liens :
         * Type 1: noelshack.com/2016-38-1474567453-1472310080-picsart-08-27-12-36-12.png
         * Type 2: noelshack.com/2019-37-1-1567994655-photoeditor-20190909-040348985.jpg
         */

        $pattern = '/(\d{4})\-(\d{2})\-(?:(\d*)\-(?:(\d*)\-|)|)((?:\w|-)*.\w*)/s';
        $match = Regex::match($pattern, $hashid);

        if ($match->hasMatch()) {
            $image = Image::where('path', $match->group(0))->first();

            if ($image) {
                return view('image', compact('image'));
            }

            return abort(404);
        }

        $image = Image::findByHashidOrFail($hashid);

        return view('image', compact('image'));
    }

    public function fromNoelshack($a, $b, $c, $d = null)
    {
        $resource = "$a/$b/$c";
        if ($d) {
            $resource .= "/$d";
        }

        $noelshackImage = NoelShackImage::where('url', $resource)->first();

        abort_if(!$noelshackImage, 404); // TODO: Tenter d'importer l'image depuis NoelShack

        $image = $noelshackImage->image;

        return redirect(Storage::url($image->path));
    }
}
