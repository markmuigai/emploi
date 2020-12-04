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
        'App\Console\Commands\SendVacancyEmails',
        'App\Console\Commands\DeactivateExpiredJobs',
        'App\Console\Commands\SendCompleteProfileEmails',
        'App\Console\Commands\DeactivateSeekerPaas',
        'App\Console\Commands\DeactivateEmployerPaas'

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
        $schedule->command('EnableProducts')->twiceDaily(7, 17)->emailOutputOnFailure('david@emploi.co')->environments(['production']);
        $schedule->command('DisableProducts')->twiceDaily(6, 16)->emailOutputOnFailure('david@emploi.co')->environments(['production']);
        // $schedule->command('command:SendVacancyEmails')->cron('0 0 * * 2,6')->emailOutputOnFailure('info@emploi.co');
        $schedule->command('command:SendVacancyEmails')->weeklyOn(6, '01:00')->emailOutputOnFailure('david@emploi.co');
        // $schedule->command('command:RevertFeaturedJobs')->dailyAt('20:00');
        $schedule->command('command:DeactivateExpiredJobs')->dailyAt('08:00');
        $schedule->command('command:ProInvoiceReminder')->monthlyOn(3, '06:30');
        $schedule->command('command:SpotlightInvoiceReminder')->monthlyOn(3, '07:30');
        // $schedule->command('command:SendCompleteProfileEmails')->monthlyOn(14, '11:00');
        $schedule->command('command:DeactivateSeekerPaas')->dailyAt('8:30');
        $schedule->command('command:DeactivateEmployerPaas')->dailyAt('9:00');
        
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
