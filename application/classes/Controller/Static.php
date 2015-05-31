<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Class Controller_Static
 *
 * Static pages
 */
class Controller_Static extends Controller_Page {

	public function action_index()
	{
        $content = View::factory('static/index');
        $var = NULL;
        $content->bind('var', $var);

        $this->content = $content;
	}

    public function action_about()
    {
        $this->set_title('О сайте.');

        $content = View::factory('static/about');
        $this->content = $content;
        $this->sidebar = '&nbsp;';
    }

    /**
     * Null action for error pages with site design
     *
     * @throws HTTP_Exception_404
     */
    public function action_null()
    {
        if ( $this->request->is_initial() ) {
            throw new HTTP_Exception_404();
        } else {

        }
    }

}

