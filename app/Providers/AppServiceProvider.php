<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Client;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->share([
            'setting' => Setting::first(),
            'services' => Service::query()->where('status', 1)->latest()->get(),
            'clients' => Client::all(),
            'projects' => Project::latest()->take(6)->get(),
            'articles' => Article::latest()->take(4)->get(),
        ]);
    }
}
