<?php
namespace Dewelio\Mail\Commands;

use Dewelio\Mail\Support\Mail;
use Illuminate\Console\Command;

class TestMail extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dw:mail:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send test email to check mail configuration.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        Mail::send('mail::mailing.test-email', [], function ($message) {
            $message->to('dohnal@gramonet.com')->subject('Dewelio test email');
        });
        $this->info('Test email sent.');
    }
}
