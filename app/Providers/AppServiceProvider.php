<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $env = collect(collect(['DATABASE_URL', 'CLEARDB_DATABASE_URL', 'JAWSDB_URL'])
            ->map(function ($value) {
                return parse_url(getenv($value));
            })->firstWhere('host', '!=', false));
        $db = collect($env)
            ->put('database', substr($env->get('path'), 1))
            ->each(function ($value, $env) {
                $keys = [
                    'host' => 'host',
                    'port' => 'port',
                    'database' => 'database',
                    'user' => 'username',
                    'pass' => 'password',
                ];
                if ($value && isset($keys[$env])) {
                    config()->set("database.connections.mysql.{$keys[$env]}", $value);
                }
            });
    }
}
