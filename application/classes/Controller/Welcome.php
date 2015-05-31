<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller
{

    public function action_index()
    {
        $db = ORM::factory('Day', 1)->find();

        $view = View::factory('default');

        $text = $db->NAME;

        $view->bind('text', $text);

        $this->response->body($view->render());
    }

} // End Welcome
