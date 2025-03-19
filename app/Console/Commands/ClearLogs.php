<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ClearLogs extends Command
{
    protected $signature = 'logs:clear';
    protected $description = 'Clear all log files in storage/logs';

    public function handle()
    {
        File::cleanDirectory(storage_path('logs'));
        $this->info('Logs cleared successfully!');
    }
}
