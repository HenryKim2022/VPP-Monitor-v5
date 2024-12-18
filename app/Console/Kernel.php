<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /////// NOTE
    //// Everytime updating this, must do
    ////    php artisan config:clear
    ////    php artisan cache:clear
    ////    php artisan route:clear

    protected function schedule(Schedule $schedule)
    {
        Log::info('Scheduler is running'); // Add this line for debugging

        // Schedule the command to run immediately
        $schedule->command('app:database-weekly-backup')->everyMinute(); // For testing purposes

        // Schedule the command to run weekly on Friday at 12:00 AM
        $schedule->command('app:database-weekly-backup')->weeklyOn(5, '00:00');

        // Schedule the command to auto-close expired worksheets every minute
        $schedule->command('app:auto-close-expired-worksheets')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
    }
}
