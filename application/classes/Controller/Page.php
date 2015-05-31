<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by PhpStorm.
 * User: Manriel
 * Date: 07.03.2015
 * Time: 4:47
 */
/**
 * Class Controller_Page
 *
 * Abstract class for Pages
 */
abstract class Controller_Page extends Controller_Template {
    public $template = 'templates/default';
    protected $title  = '';
    protected $meta   = array();
    protected $style  = array();
    protected $script = array();
    protected $menu   = NULL;
    public $content = '';
    public $sidebar = '';
    protected $alerts  = array();
    protected $isAjax  = FALSE;
    public function __construct(Request $request, Response $response) {
        if (strpos($_SERVER["HTTP_HOST"], 'www.') === 0) {
            $this->redirect(str_replace('www.', '', $_SERVER["HTTP_HOST"]));
        }
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $this->isAjax = TRUE;
            $this->template = 'templates/ajax';
        }
        parent::__construct($request, $response);
        $config = Kohana::$config->load('site');
        $this->title  = $config->get('title', '');
        $this->meta   = $config->get('meta', array());
    }
    public function before() {
        parent::before();
        $config = Kohana::$config->load('site');
        $this->style  = $config->get('style', array());
        $this->script = $config->get('script', array());
        $this->menu = Request::factory('menu/main');
    }
    public function after() {
        $meta = '';
        foreach ($this->meta as $attr) {
            $meta .= '<meta'.HTML::attributes($attr).'>'.PHP_EOL;
        }
        $style = '';
        foreach ($this->style as $str) {
            $style .= HTML::style($str).PHP_EOL;
        }
        $script = '';
        foreach ($this->script as $str) {
            $script .= HTML::script($str).PHP_EOL;
        }
        $title = HTML::chars(trim($this->title));
        $this->menu = $this->menu->execute()->body();
        $this->template->bind('menu', $this->menu);
        $this->template->bind('meta', $meta);
        $this->template->bind('style', $style);
        $this->template->bind('script', $script);
        $this->template->bind('title', $title);
        $this->template->bind('sidebar', $this->sidebar);
        $this->template->bind('content', $this->content);
        $this->template->bind('alerts', $this->alerts);
        parent::after();
    }
    /**
     * Override this method for default index page
     *
     * @return null
     */
    abstract public function action_index();
    public function set_title($str = '') { $this->title = trim($str); }
    public function get_title() { return $this->title; }
    public function set_meta(array $attr = array()) { $this->meta[] = $attr; }
    public function set_style($str = '') { $this->style[] = $str; }
    public function set_script($str = '') { $this->script[] = $str; }
    /**
     * That changes current template of a site page.
     * Warning! It also resets scripts and styles.
     *
     * @param string $template
     */
    public function set_template($template = '') {
        $this->template = $template;
        self::before();
    }
    /**
     * The method creates an alert message
     *
     * @param string $text
     * @param string $type      Available types: info, success, warning, danger
     * @param bool   $autohide  If true, a alert will be automatically hidden after 2 sec.
     */
    public function set_alert($text = '', $type = 'info', $autohide = FALSE) {
        if (is_bool($type)) {
            $autohide = $type;
            $type     = 'info';
        }
        $this->alerts[] = array('text' => $text, 'type' => $type, 'autohide' => $autohide);
    }
}