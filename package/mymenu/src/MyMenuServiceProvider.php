<?php
/**
 * Created by PhpStorm.
 * User: Tahmidur Rahman
 * Date: 9/30/2018
 * Time: 12:52 AM
 */

namespace Tahmid\MyMenu;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class MyMenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        View::share('My_menu', '<h1>This is my menu</h1>');
    }

    public function register()
    {

    }
}
