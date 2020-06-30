<?php


namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('plugin.sidebar', 'App\Http\ViewComposers\CategoriesComposer');
    }

    public function register(){}
}
