<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // // Schedule your jobs here
        // $schedule->job(new \App\Jobs\CheckExpiredWorksheetsJob)->everyFiveMinutes();
        // // // Schedule the command to run hourly
        // // $schedule->command('worksheets:check-expired')->hourly();

        // $schedule->command('run:every-three-seconds')->everyMinute();
        $schedule->command('run:every-hour')->hourly();
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
    }
}
