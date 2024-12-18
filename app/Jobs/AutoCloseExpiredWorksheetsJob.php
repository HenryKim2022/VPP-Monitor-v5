<?php

namespace App\Jobs;

use App\Models\DaftarWS_Model;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;



class AutoCloseExpiredWorksheetsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        //
        $now = Carbon::now();

        // Find worksheets that are expired
        $expiredWorksheets = DaftarWS_Model::with('task')->where('status_ws', 'OPEN')
            ->whereNotNull('expired_at_ws')
            ->where('expired_at_ws', '<', $now)
            ->get();
        foreach ($expiredWorksheets as $worksheet) {
            $workDate = $worksheet->working_date_ws;
            $prjID = $worksheet->id_project;
            if ($worksheet->status_ws == 'OPEN'){
                // Update the status to LOCKED or any other status you prefer
                $worksheet->status_ws = 'LOCKED';
                $worksheet->closed_at_ws = Carbon::now()->format('Y-m-d H:i:s');
                $worksheet->save();

                // Reset progress for related tasks
                foreach ($worksheet->task as $task) {
                    $task->progress_current_task = 0;
                    $task->save();
                }

                // Optionally log or notify about the locked worksheets
                Log::info("Worksheet ProjectID: {$prjID} WSID:{$worksheet->id_ws} WorkDate:{$workDate} has been locked due to expiration.");
            }else{
                $worksheet->closed_at_ws = Carbon::now()->format('Y-m-d H:i:s');
                $worksheet->save();

                // Reset progress for related tasks
                foreach ($worksheet->task as $task) {
                    $task->progress_current_task = 0;
                    $task->save();
                }

                // Optionally log or notify about the locked worksheets
                Log::info("Worksheet ProjectID: {$prjID} WSID:{$worksheet->id_ws} WorkDate:{$workDate} has been locked due to expiration.");

            }
        }
    }
}
