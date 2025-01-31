<?php

namespace App\Providers;

use App\View\Components\ChatBox;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;
use Carbon\Carbon;


Carbon::setLocale('ja');

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


        Carbon::setLocale('ja');
        Blade::component('chat-box', ChatBox::class);

    }


}
