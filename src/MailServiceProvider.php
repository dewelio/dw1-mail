<?php

namespace Dewelio\Mail;

use Dewelio\Config\Support\Config;
use Dewelio\Base\Providers\BaseServiceProvider;
use Dewelio\Mail\Support\Mail;

class MailServiceProvider extends BaseServiceProvider
{

    protected array $commands = [
        Commands\TestMail::class,
    ];

    public function boot(): void {
        try {
            if(Config::get('mail/general/default/disabled')) {
                config(['mail.default' => 'log']);
            } else {
                config(['mail.default' => Config::get('mail/general/default/mailer')]);
                $smtp = [
                    'transport' => 'smtp',
                    'host' => Config::get('mail/general/default/host'),
                    'port' => Config::get('mail/general/default/port'),
                    'encryption' => Config::get('mail/general/default/encryption'),
                    'username' => Config::get('mail/general/default/username'),
                    'password' => Config::get('mail/general/default/password'),
                    'timeout' => null,
                    'auth_mode' => null,
                ];
                $from = [
                    'address' => Config::get('mail/general/default/from_address'),
                    'name' => Config::get('mail/general/default/from_name'),
                ];
                config(['mail.mailers.smtp' => $smtp]);
                config(['mail.from' => $from]);

                if(Config::get('mail/general/default/development')) {
                    Mail::alwaysTo(Config::get('mail/general/development/email'));
                }
            }
        } catch(\Exception $e) {
            config(['mail.default' => 'log']);
        }
        parent::boot();
    }
}
