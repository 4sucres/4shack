<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Image;
use App\Helpers\HumanReadable;
use App\Models\NoelShackImage;

Route::get('/', function () {
    $totalCount = Image::count();
    $totalSize = HumanReadable::bytesToHuman(
        Image::selectRaw('sum(size) as sum')->first()->sum
    );

    return view('welcome', compact('totalCount', 'totalSize'));
});

Route::get('/{hashid}', function ($hashid) {
    $image = Image::findByHashidOrFail($hashid);

    return view('image', compact('image'));
});

/**
 * Type 1
 * /2016/38/1474567453-1472310080-picsart-08-27-12-36-12.png
 */

Route::get('/{a}/{b}/{c}', function ($a, $b, $c) {
    $resource = "$a/$b/$c";

    $noelshackImage = NoelShackImage::where('url', $resource)->first();
    abort_if(!$noelshackImage, 404);

    $image = $noelshackImage->image;

    return redirect(Storage::url($image->path));
});

/**
 * Type 2
 * /2019/37/1/1567994655-photoeditor-20190909-040348985.jpg
 */

Route::get('/{a}/{b}/{c}/{d}', function ($a, $b, $c, $d) {
    $resource = "$a/$b/$c/$d";

    $noelshackImage = NoelShackImage::where('url', $resource)->first();
    abort_if(!$noelshackImage, 404);

    $image = $noelshackImage->image;

    return redirect(Storage::url($image->path));
});
