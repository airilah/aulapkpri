<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    // protected function schedule(Schedule $schedule)
    // {
    //     $schedule->call(function () {
    //         DB::table('pemesanans')
    //             ->whereNull('bukti_pembayaran')
    //             ->where('status', 'Belum terverifikasi')
    //             ->where('waktu_expired', '<=', Carbon::now())
    //             ->update(['status' => 'Kadaluarsa']);
    //     })->everyMinute();
    // }
}
