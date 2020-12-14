<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;
use App\Invoice;

class ProInvoiceReminder extends Command
{
    protected $signature = 'command:ProInvoiceReminder';

    protected $description = 'Sends an e-mail reminder for all unpaid invoices for Pro plan';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $invoices = Invoice::where('pesapal_transaction_tracking_id',null)
                    ->where('alternative_payment_slug',null)
                    ->where('sub_total',159.00)
                    ->where('created_at', '>', Carbon::now()->subDays(31))
                    ->get();
        $this->info('Sending an invoice reminder for all unpaid invoices for Pro plan:  '.count($invoices));

        $success = 0;
        $failed = 0;

        for ($k=0; $k < count($invoices); $k++) { 
            if ($invoices[$k]->remindPro('email')) {
                $success++;
            }
            else {
                $failed++;
            }    
        }

        $this->info('Invoice Reminders sent! Success:  '.$success.', Failed:  '.$failed);
    }
}
