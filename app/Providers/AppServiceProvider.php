<?php

namespace App\Providers;

use App\Property;
use Illuminate\Support\ServiceProvider;

use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        // ...
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            //if(Gate::allows('manage-users')) {
            if(Gate::allows('super-admin')) {

            //    if(Gate::allows('pages-edit')) {

                $event->menu->add([
                        'key'    => 'ADMIN_MENU',
                        'header' => 'ADMIN_MENU',
                    ],
                    [
                        'key'     => 'properties',
                        'text'    => 'properties',
                        'icon'    => 'nav-icon fas fa-book',
                        'url'     => 'admin',
                        'can'     => 'super-admin',
                        'submenu' => [
                            [
                                'key'  => 'all_properties',
                                'text' => 'all_properties',
                                'url'  => 'admin',
                                'can'  => 'super-admin',
                            ],
                        ],
                    ],
                    [
                        'key'     => 'site_pages',
                        'text'    => 'site_pages',
                        'icon'    => 'nav-icon fas fa-book',
                        'url'     => 'admin.super/pages',
                        'can'     => 'super-admin',
                        'submenu' => [
                            [
                                'key'  => 'page_create',
                                'text' => 'page_create',
                                'url'  => 'admin.super/pages/create',
                                'can'  => 'super-admin',
                            ],
                        ],
                    ]
                );

              //  }
            }
        });
    }
}
