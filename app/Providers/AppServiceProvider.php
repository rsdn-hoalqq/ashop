<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Model\Producer;
use App\Model\TypeProducts;
use App\Model\Contact;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         \Schema::defaultStringLength(191);
         View::share('adminUrl',getenv('ADMIN_URL'));
         View::share('imgUrl',getenv('IMG_URL'));
         View::share('arProducers',Producer::all());
         View::share('counts',Contact::where('status',0)->count());
         View::share('count_all',Contact::all()->count());
         View::share('count_bin',Contact::onlyTrashed()->where('deleted_at','!=',Null)->count());
         View::share('TypeProducts',TypeProducts::all());
         View::share('publicUrl',getenv('PUBLIC_URL'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
