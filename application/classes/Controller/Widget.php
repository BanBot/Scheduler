<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by PhpStorm.
 * User: Manriel
 * Date: 07.03.2015
 * Time: 6:19
 */
/**
 * Class Controller_Widget
 *
 * Abstract class for Widget elements
 */
abstract class Controller_Widget extends Controller {
    /**
     * @param Request  $request
     * @param Response $response
     *
     * @throws HTTP_Exception_404
     */
    public function __construct(Request $request, Response $response) {
        if ($request->is_initial()) {
            throw new HTTP_Exception_404();
        }
        parent::__construct($request, $response);
    }
    /**
     * Override this method for default index action
     *
     * @return null
     */
    abstract public function action_index();
}