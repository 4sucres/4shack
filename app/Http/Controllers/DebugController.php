<?php

/**
 * To be deleted
 */

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class DebugController extends Controller
{
    public function randomFiles()
    {
        $images = Image::inRandomOrder()->take(10)->get();

        echo "<table border='1'>";

        foreach ($images as $image) {
            echo "<tr>";
            echo "<td>" . $image->id . "</td>";
            echo "<td><a href=" . url('/' . $image->hashid()) . ">" . $image->hashid() . "</td>";
            echo "<td><a href=" . url('/' . $image->path) . ">" . $image->path . "</td>";
            echo "<td><a href=" . url('/' . optional($image->noelshack_image)->url) . ">" . optional($image->noelshack_image)->url . "</td>";
            echo "<td><a href=" . Storage::url($image->path) . ">" . Storage::url($image->path) . "</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    }
}
