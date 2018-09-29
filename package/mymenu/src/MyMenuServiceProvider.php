<?php
/**
 * Created by PhpStorm.
 * User: Tahmidur Rahman
 * Date: 9/30/2018
 * Time: 12:52 AM
 */

namespace Tahmid\MyMenu;
use Illuminate\Support\ServiceProvider;

class MyMenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }

    public function register()
    {

    }
}
