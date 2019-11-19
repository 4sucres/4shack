<?php

namespace App\Console\Commands;

use App\Models\Image;
use Illuminate\Console\Command;

class StorageWatchdogCommand extends Command
{
    protected $storageLimit = '70' * 1000 * 1000 * 1000; // In bytes

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storage:watchdog';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Turn off the application if the storage reaches a certain limit';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $totalSize = Image::selectRaw('sum(size) as sum')->first()->sum;

        if ($totalSize > $this->storageLimit) {
            \Artisan::command('down');
        }
    }
}
