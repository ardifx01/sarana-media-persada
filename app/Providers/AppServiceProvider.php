<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\MediaCategory;
use App\Models\Company;
use \stdClass;

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
        Schema::defaultStringLength(191);
        View::share('default_vat', 11);
        $bank_account = new stdClass();
        $bank_account->number = '040 332 2323';
        $bank_account->name = 'PT. SARANA MEDIA PERSADA';
        $bank_account->bank = 'BCA Cabang Hasanudin, Denpasar - Bali';
        $bank_account->director = 'Iwan Tanusaputera';
        View::share('bank_account', $bank_account);
        View::share('categories', MediaCategory::all());
        View::share('company', Company::where('id', '=' , 4)->firstOrFail());
    }
}
