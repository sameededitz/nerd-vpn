<?php

namespace App\Console\Commands;

use App\Models\ProcessedWebhook;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CleanProcessedWebhooks extends Command
{
    protected $signature = 'webhooks:clean';
    protected $description = 'Delete processed webhooks that are older than 12 hours';

    public function handle()
    {
        $this->info('Starting cleanup of processed webhooks...');

        $deletedCount = ProcessedWebhook::where('expires_at', '<', Carbon::now())->delete();

        $this->info("Deleted {$deletedCount} processed webhook(s) older than 12 hours.");
        return 0;
    }
}
