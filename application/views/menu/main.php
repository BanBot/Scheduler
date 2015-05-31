<?php
/**
 * Created by PhpStorm.
 * User: Manriel
 * Date: 07.03.2015
 * Time: 4:09
 */
?>
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=URL::base();?>">Генератор расписания</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <?php Menu::generate($arResult); ?>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>