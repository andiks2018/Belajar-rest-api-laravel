<?php

namespace App\Providers;

use App\Http\Resources\QuoteResource;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

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
        // NAMUN KONDISI NORMALNYA MEMANG ADA WRAPPINGNYA

        // // menghilangkan data wrapping
        // QuoteResource::withoutWrapping();

        // // bagaimana kalau kita ingin menghilangkan data wrapping di semua resource
        // JsonResource::withoutWrapping();
    }
}
