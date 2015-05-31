<?php defined('SYSPATH') or die('No direct script access');
/**
 * Created by PhpStorm.
 * User: Manriel
 * Date: 07.03.2015
 * Time: 2:55
 */
$arMainMenu = array(
    array(
        'TEXT' => 'Главная',
        'LINK' => URL::base(),
        'SHOW' => false,
    ),
    array(
        'TEXT'  => 'Агенты',
        'LINK'  => URL::base().'user/',
        'SHOW'  => false,
        'CHILD' => array(
            array(
                'TEXT' => '<span class="glyphicon glyphicon-list-alt"></span> Список',
                'LINK' => URL::base().'user/list/',
                'SHOW' => false,
            ),
            array(
                'TYPE' => 'divider',
                'SHOW' => false,
            ),
            array(
                'TYPE' => 'header',
                'TEXT' => 'Тестовый заголовок',
                'SHOW' => false,
            ),
            array(
                'TYPE' => 'disabled',
                'TEXT' => 'Тестовый пункт',
                'SHOW' => false,
            ),
        ),
    ),
    array(
        'TEXT' => 'Полезные ссылки',
        'LINK' => '#'.URL::base().'contact/',
        'SHOW' => false,
    ),
);
return array(
    'main' => $arMainMenu,
);