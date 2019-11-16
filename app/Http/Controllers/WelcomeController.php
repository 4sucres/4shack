<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Helpers\HumanReadable;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $totalCount = Image::count();
        $totalSize = HumanReadable::bytesToHuman(
            Image::selectRaw('sum(size) as sum')->first()->sum
        );

        return view('welcome', compact('totalCount', 'totalSize'));
    }
}
