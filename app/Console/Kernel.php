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
        'App\Console\Commands\DeactivateEmployerPaas',
        'App\Console\Commands\SendMassProfileViewedEmail'

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
        // $schedule->command('command:SendVacancyEmails')->weeklyOn(5, '01:00')->emailOutputOnFailure('david@emploi.co');
        // $schedule->command('command:RevertFeaturedJobs')->dailyAt('20:00');
        $schedule->command('command:DeactivateExpiredJobs')->dailyAt('08:00');
        $schedule->command('command:ProInvoiceReminder')->twiceMonthly(28, 04, '6:00');
        $schedule->command('command:SpotlightInvoiceReminder')->twiceMonthly(28, 04, '6:00');
        // $schedule->command('command:SendCompleteProfileEmails')->monthlyOn(14, '11:00');
        $schedule->command('command:DeactivateSeekerPaas')->dailyAt('8:30');
        $schedule->command('command:DeactivateEmployerPaas')->dailyAt('9:00');
        // $schedule->command('command:SendMassProfileViewedEmail')->weeklyOn(1, '07:00')->emailOutputOnFailure('info@emploi.co');
        
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
