<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Invoice;

class SendInvoiceReminder extends Command
{
    protected $signature = 'command:SendInvoiceReminder';

    protected $description = 'Sends an e-mail reminder for all unpaid incoices';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $invoices = Invoice::where('pesapal_transaction_tracking_id',null)
                    ->where('alternative_payment_slug',null)
                    ->get();
        $this->info('Sending an invoice reminder for all unpaid invoices:  '.count($invoices));

        $success = 0;
        $failed = 0;

        for ($k=0; $k < count($invoices); $k++) { 
            if ($invoices[$k]->remind('email')) {
                $success++;
            }
            else {
                $failed++;
            }    
        }

        $this->info('Invoice Reminders sent! Success:  '.$success.', Failed:  '.$failed);
    }
}
