<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\ProductOrder;

class EnableProducts extends Command
{
    protected $signature = 'EnableProducts';
    protected $name = 'EnableProducts';

    protected $description = 'Enables products which have not been activated.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        ProductOrder::enablePending();
    }
}
