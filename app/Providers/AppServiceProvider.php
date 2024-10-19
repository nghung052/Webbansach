<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Company;

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
        view()->composer('layout_index.header', function ($view) {
            $types = ProductType::all();
            $product_n = [];
            $types_id = [];
            $types_name = [];
            foreach ($types as $t) {
                $product_numbers = Product::where('id_type', $t->id)
                    ->where('status', '1')
                    ->count('id');
                $product_n[] = $product_numbers;
                $types_id[] = $t->id;
                $types_name[] = $t->name;
            }
            $company = Company::all();
            $view->with(['types' => $types, 'company' => $company, 'product_n' => $product_n, 'types_id' => $types_id, 'types_name' => $types_name]);
        });
        view()->composer(['layout_index.page.cart', 'layout_index.page.checkout'], function ($view) {
            if (Session('cart')) {
                $oldcart = Session::get('cart');
                $cart = new Cart($oldcart);
                $view->with([
                    'cart' => Session::get('cart'),
                    'product_cart' => $cart->items,
                    'totalPrice' => $cart->totalPrice,
                    'totalQty' => $cart->totalQty
                ]);
            }
        });
        Schema::defaultStringLength(191);
    }
}
