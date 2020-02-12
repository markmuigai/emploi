<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DisableProducts extends Command
{
    protected $signature = 'DisableProducts';
    protected $name = 'DisableProducts';

    protected $description = 'Disables products which have expired.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        //disallow product features
        //featured_seeker
        //entry_level_cv_edit
        //medium_level_cv_edit
        //c_change_cv_edit
        //mgnt_cv_edit
        //s_mgnt_cv_edit
        //seeker_basic
        //stawi
        //solo
        //solo-plus
        //infiniti
    }
}
