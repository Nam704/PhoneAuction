<?php

namespace App\Providers;

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
        if ($this->app->runningInConsole()) {
            $mainPath = database_path('migrations');

            // Lấy tất cả thư mục con bên trong database/migrations
            $directories = glob($mainPath . '/*', GLOB_ONLYDIR);

            // Gộp thư mục gốc và các thư mục con
            $paths = array_merge([$mainPath], $directories);

            // Yêu cầu Laravel load migration từ tất cả các đường dẫn này
            $this->loadMigrationsFrom($paths);
        }
    }
}