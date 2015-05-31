<?php defined('SYSPATH') or die('No direct script access.');

class HTTP_Exception_404 extends Kohana_HTTP_Exception_404 {

    /**
     * Generate a Response for the 404 Exception.
     *
     * The user should be shown a nice 404 page.
     *
     * @return Response
     */
    public function get_response() {
        $view = View::factory('error');

        // Remembering that `$this` is an instance of HTTP_Exception_404
        $title = '404 '.Response::$messages[404];
        $message = 'The requested URL was not found on this server.';
        $view->bind('title',   $title);
        $view->bind('message', $message);

        $request = Request::factory();
        $request->controller('static');
        $request->action('null');
        $response = Response::factory();

        $controller = new Controller_Static($request, $response);
        $controller->content = $view->render();
        $controller->set_title($title);

        return $controller->execute()->status(404);
    }
}