<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by PhpStorm.
 * User: Manriel
 * Date: 07.03.2015
 * Time: 3:53
 */
class Controller_Menu extends Controller_Widget {
    public function action_index() {
        return FALSE;
    }
    public function action_main()
    {
        if ( Request::initial() == Request::current() )
            Kohana_HTTP_Exception::factory('404');
        $menu = Kohana::$config->load('menu');
        $arMenu = $menu->get('main');
        $arMenu = Menu::check_active($arMenu);

        $view = View::factory('menu/main');
        $view->bind('arResult', $arMenu);

        $this->response->body($view);
    }
}