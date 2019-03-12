<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Http\Repositories\MyMenuRepository;

class MyMenuComposer {
    public $my_nav_menu = [];

    public function __construct(MyMenuRepository $myMenu) {
        //$this->my_nav_menu = $myMenu->get_menu();
        //$this->my_nav_menu = $myMenu->getMyMenu();
    }

    public function compose(View $view) {
        /*View::composer('*', function($view){
            $view->with('my_nav_menu', $this->my_nav_menu);
        });*/
        //$view->with('my_nav_menu', $this->my_nav_menu);
    }
}
