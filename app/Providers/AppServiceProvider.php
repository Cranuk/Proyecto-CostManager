<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        \Laravel\Sanctum\Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Blade::directive('formatDate', function ($expression) {
            return "<?php echo \App\Helpers\MyHelpers::formatDate($expression); ?>";
        });

        Blade::directive('formatCurrency', function ($expression) {
            return "<?php echo \App\Helpers\MyHelpers::formatCurrency($expression); ?>";
        });
    }
}
