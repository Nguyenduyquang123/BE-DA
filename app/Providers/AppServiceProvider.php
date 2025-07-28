<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\Interface\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Services\CategoriesServices;
use App\Services\Interface\BaseServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
       $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(BaseServiceInterface::class, CategoriesServices::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
