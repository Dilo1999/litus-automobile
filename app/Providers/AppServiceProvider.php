<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
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
        // Fix for MySQL string length issue
        Schema::defaultStringLength(191);
        
        // Set Filament admin panel brand name
        Config::set('filament.brand', 'alzaha Management');

        // Set Filament admin panel favicon from system settings
        try {
            if (Schema::hasTable('settings')) {
                $favicon = Setting::get('favicon');
                if ($favicon) {
                    Config::set('filament.favicon', asset('storage/' . $favicon));
                }
            }
        } catch (\Throwable $e) {
            // Ignore during migrations or when settings table doesn't exist
        }
    }
}
