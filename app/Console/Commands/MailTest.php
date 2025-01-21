<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mail-test {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        // Send a test email
        Mail::raw('This is a test email to check email functionality.', function ($message) use ($email) {
            $message->to($email)
                ->subject('Test Email from Laravel');
        });

        $this->info("Test email sent to {$email}!");
        return 0;
    }
}
