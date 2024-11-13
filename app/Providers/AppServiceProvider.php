<?php

namespace App\Providers;

use App\Models\SMTP;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        $mailSetting = SMTP::find(1);
        if ($mailSetting) {
            $data = [
                "driver" => $mailSetting->mail_mailer,
                "host" => $mailSetting->mail_host,
                "port" => $mailSetting->mail_port,
                "username" => $mailSetting->mail_username,
                "password" => $mailSetting->mail_password,
                "encryption" => $mailSetting->mail_encryption,
                "from" => [
                    "address" => $mailSetting->mail_from_address,
                    "name" => $mailSetting->app_name,
                ]
            ];
            $AppName = [
                "name" => $mailSetting->app_name,
            ];
            Config::set("app.name", $AppName["name"]);
            Config::set("mail", $data);
        }
    }
}
