<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('migrate:from-s3', function () {
    $count = \App\Models\Image::count();
    $bar = $this->output->createProgressBar($count);

    \App\Models\Image::query()
        ->orderBy('created_at')
        ->chunk(1000, function ($chunk) use ($bar) {
            $s3 = \Storage::disk('s3');
            $local = \Storage::disk('public');

            foreach ($chunk as $file) {
                try {
                    $local->put(
                        $file->path,
                        $s3->get($file->path)
                    );
                } catch (\Throwable $th) {
                    report($th);
                    $this->error($th->getMessage());
                }
                $bar->advance();
            }
        });

    $bar->finish();
    $this->line('');
});
