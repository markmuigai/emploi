<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\DisableProducts',
        'App\Console\Commands\EnableProducts',
        'App\Console\Commands\SendVacancyEmails'

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        // $schedule->command('backup:clean')->daily()->at('01:00')->onFailure(function () {

        //     $code = 'Backup:clean Error';
        //     $message = "$code: An error occurred while cleaning out old backups!";
        //     if (app()->environment() === 'production')
        //         \App\Jurisdiction::first()->notify(new \App\Notifications\SystemError($message));
            
        // });
        // $schedule->command('backup:run')->daily()->at('02:00')->onFailure(function () {
        //     $code = 'Critical Error -> Backup:run Failed!';
        //     $message = "$code: An error occurred while cleaning out old backups!";
        //     if (app()->environment() === 'production')
        //         \App\Jurisdiction::first()->notify(new \App\Notifications\SystemError($message));
        // });
        $schedule->command('EnableProducts')->twiceDaily(7, 17)->emailOutputOnFailure('info@emploi.co');
        $schedule->command('DisableProducts')->twiceDaily(6, 16)->emailOutputOnFailure('info@emploi.co');
        $schedule->command('command:SendInvoiceReminder')->weeklyOn(1, '7:20');
        $schedule->command('command:SendVacancyEmails')->dailyAt('16:30')->emailOutputOnFailure('info@emploi.co');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
