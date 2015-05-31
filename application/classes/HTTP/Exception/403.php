<?php defined('SYSPATH') or die('No direct script access.');

class HTTP_Exception_403 extends Kohana_HTTP_Exception_403 {

    /**
     * Generate a Response for the 403 Exception.
     *
     * The user should be shown a nice 403 page.
     *
     * @return Response
     */
    public function get_response() {
        $view = View::factory('error');

        // Remembering that `$this` is an instance of HTTP_Exception_404
        $title = '403 '.Response::$messages[403];
        $message = $this->getMessage();
        $view->bind('title',   $title);
        $view->bind('message', $message);

        $request = Request::factory();
        $request->controller('static');
        $request->action('null');
        $response = Response::factory();

        $controller = new Controller_Static($request, $response);
        $controller->content = $view->render();
        $controller->set_title($title);

        return $controller->execute()->status(403);
    }
}