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
            if(Gate::allows('manage-users')) {
                $event->menu->add(['header' => 'ADMIN_MENU']);

            //    if(Gate::allows('pages-edit')) {

                    $event->menu->add([
                        'text'    => 'site_pages',
                        'icon'    => 'nav-icon fas fa-book',
                        'url'     => 'admin.super/pages',
                        'can'     => 'super-admin',
                        'submenu' => [
                            [
                                'text' => 'page_create',
                                'url'  => 'admin.super/pages/create',
                                'can' => 'super-admin',
                            ],
                        ],
                        ]);

              //  }
            }
        });



/*

        $menu = new Menu;
        $menus = $menu->withSubMenus();

        foreach($menus as $menu){

            $arrayMenu = array('text' => '', 'url' => '', 'icon' => '');

            if(count($menu->SubMenu) != NULL){
                foreach($menu->SubMenu as $submenu){
                    $arrayMenu[] = array(
                        'text' => $submenu->name,
                        'url' => $submenu->url,
                        'icon' => $submenu->icon
                    );

                };
                $event->menu->add([
                    'text' => $menu->name,
                    'url' => $menu->url,
                    'icon' => $menu->icon,
                    'submenu' => $arrayMenu,
                ]);
            }else{
                $event->menu->add([
                    'text' => $menu->name,
                    'url' => $menu->url,
                    'icon' => $menu->icon,
                ]);
            }
        }
    });
*/
    }
}
