<?php

namespace App\Http\Controllers;

use App\Helpers\NoelShack;
use App\Models\Image;
use App\Models\NoelShackImage;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function show($hashid)
    {
        if (NoelShack::match($hashid, NoelShack::PATTERN_DASH)) {
            $image = Image::where('path', $hashid)->first();

            if (!$image) {
                $image = NoelShack::retrieve($hashid);

                if (!$image) {
                    return abort(404);
                }
            }

            return view('image', compact('image'));
        }

        $image = Image::findByHashidOrFail($hashid);

        return view('image', compact('image'));
    }

    public function fromNoelshack($a, $b, $c, $d = null)
    {
        $uri = "$a/$b/$c";
        if ($d) {
            $uri .= "/$d";
        }

        $noelshackImage = NoelShackImage::where('url', $uri)->first();

        if (!$noelshackImage) {
            $image = NoelShack::retrieve($uri);
            abort_if(!$image, 404);
        } else {
            $image = $noelshackImage->image;
        }

        return redirect(Storage::url($image->path));
    }
}
