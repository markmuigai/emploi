<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\ProductOrder;
use App\Seeker;

use Carbon\Carbon;

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
        ProductOrder::deactivateExpired();
    }
}
