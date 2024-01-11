<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        //
        Blade::directive('clean', function ($expression) {
            return "<?php echo preg_replace('/[^a-zA-Z0-9\s]/', '', nl2br($expression)); ?>";
        });
    }
}
