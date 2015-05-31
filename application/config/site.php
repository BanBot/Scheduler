<?php defined('SYSPATH') or die('No direct script access');
/**
 * Created by PhpStorm.
 * User: Manriel
 * Date: 07.03.2015
 * Time: 2:34
 */
return array(
    'title'     =>  'Генератор расписания',
    'meta'      =>  array(
        array(
            'charset'    => 'utf-8',
        ),
        array(
            'http-equiv' => 'X-UA-Compatible',
            'content'    => 'IE=edge',
        ),
        array(
            'name'       => 'viewport',
            'content'    => 'width=device-width, initial-scale=1',
        ),
    ),
    'style'     =>  array(
        URL::base().'css/bootstrap.min.css',
        URL::base().'css/css.css',
    ),
    'script'    =>  array(
        'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js',
        URL::base().'js/bootstrap.min.js',
        URL::base().'js/main.js',
    ),
);