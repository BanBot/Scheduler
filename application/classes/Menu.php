<?php
/**
 * Created by PhpStorm.
 * User: Manriel
 * Date: 22.03.2015
 * Time: 16:14
 */
class Menu {
    const DIVIDER = 'divider';
    const HEADER = 'header';
    const DISABLED = 'disabled';
    /**
     * @var array   Special types of menu items
     */
    protected static $arTypes = array(self::DIVIDER, self::HEADER, self::DISABLED);
    /**
     * Method generate menu code from menu array
     *
     * @param     $arMenu
     * @param int $level
     * @param int $maxLevel
     */
    public static function generate($arMenu, $level = 1, $maxLevel = 4) {
        if ($level > $maxLevel) {
            return;
        }
        $ulClass = '';
        if ($level == 1) {
            $ulClass = 'nav navbar-nav';
        } else {
            $ulClass = 'dropdown-menu';
        }
        echo '<ul class="'.$ulClass.'"';
        if ($level == 2) {
            echo 'role="menu" aria-labelledby="dropdownMenu"';
        }
        echo '>';
        foreach ($arMenu as $arItem) {
            if ($arItem['SHOW'] || !isset($arItem['SHOW'])) {
                if (isset($arItem['TYPE']) && in_array($arItem['TYPE'], static::$arTypes)){
                    switch ($arItem['TYPE']) {
                        case self::DIVIDER:
                            echo '<li class="divider"></li>';
                            break;
                        case self::HEADER:
                            if (isset($arItem['TEXT'])) {
                                echo '<li class="dropdown-header">';
                                echo $arItem['TEXT'];
                                echo '</li>';
                            }
                            break;
                        case self::DISABLED:
                            if (isset($arItem['TEXT'])){
                                echo '<li class="disabled">';
                                echo '<a href="javascript:">'.$arItem['TEXT'].'</a>';
                                echo '</li>';
                            }
                            break;
                        default:
                            break;
                    }
                    continue;
                }
                echo '<li';
                $class    = '';
                $hasChild = isset($arItem['CHILD']) && !empty($arItem['CHILD']);
                if ($hasChild)
                    $class .= ' dropdown';
                if ($hasChild && $level > 1)
                    $class .= '-submenu';
                if ($arItem['SELECTED'])
                    $class .= ' active';
                if (strlen($class))
                    echo ' class="'.$class.'"';
                echo '>';
                echo '<a href="'.$arItem['LINK'].'" ';
                if ($hasChild)
                    echo ' class="dropdown-toggle" data-toggle="dropdown"';
                echo '>'.$arItem["TEXT"];
                if ($hasChild && $level == 1)
                    echo '&nbsp;<b class="caret"></b>';
                echo '</a>';
                if ($hasChild) {
                    $level++;
                    static::generate($arItem['CHILD'], $level, $maxLevel);
                }
                echo '</li>';
            }
        }
        echo '</ul>';
    }
    /**
     * Method check menu items for active
     *
     * @param $arMenu
     *
     * @return mixed
     * @throws Kohana_Exception
     */
    public static function check_active(&$arMenu) {
        foreach ($arMenu as $index => &$arItem) {
            if (!isset($arItem['SHOW'])) {
                $arItem['SHOW'] = TRUE;
            }
            if (isset($arItem['TYPE']) && in_array($arItem['TYPE'], static::$arTypes)){
                $arItem['SELECTED'] = FALSE;
                continue;
            }
            $uri = Request::$current->detect_uri();
            if (substr($uri, strlen($uri) - 1) !== '/') {
                $uri .= '/';
            }
            if (isset($arItem['LINK']) && $arItem['LINK'] == $uri) {
                $arItem['SELECTED'] = TRUE;
            } else {
                $arItem['SELECTED'] = FALSE;
                if (!isset($arItem['LINK']))
                    $arItem['LINK'] = 'javascript:';
            }
            if (isset($arItem['CHILD']) && is_array($arItem['CHILD'])) {
                $arItem['CHILD'] = self::check_active($arItem['CHILD']);
                foreach ($arItem['CHILD'] as $arChild) {
                    if ($arChild['SELECTED']) {
                        $arItem['SELECTED'] = TRUE;
                    }
                }
            }
        }
        return $arMenu;
    }
}