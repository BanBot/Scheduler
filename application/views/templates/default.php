<?php defined('SYSPATH') or die('No direct script access.');?><!DOCTYPE html>
<html lang="ru">
<head>
    <?=$meta;?>
    <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon" />
    <link rel="icon" href="/favicon.png" type="image/png" />
    <title><?=$title;?></title>
    <?=$style;?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?=$script;?>
</head>
<body>
<?=$menu;?>
<div class="container">

    <div class="alerts-wrap hidden-print"><div class="alerts" id="alerts">
            <?php foreach ($alerts as $index => $alert):?>
            <div class="alert alert-<?php echo $alert['type'];?> alert-dismissable<?php if($alert['autohide']) echo ' autohide';?> fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?=$alert['text'];?>
            </div>
            <?php endforeach;?>
        </div></div>

    <?php if (isset($sidebar) && strlen($sidebar)):?>
    <div class="row">
        <div class="col-sm-4"><?=$sidebar;?></div>
        <div class="col-sm-8"><?=$content;?></div>
    </div>
    <?php else:?>
       <?=$content;?>
    <?php endif;?>
    <div class="footer-helper">
        <div class="row">
            <div class="col-sm-4">
                <span class="text-muted">&nbsp;</span>
            </div>
            <div class="col-sm-4">
                <span class="text-muted">&nbsp;</span>
            </div>
            <div class="col-sm-4">
                <span class="text-muted">&nbsp;</span>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <span class="text-muted">Powered by Kohana v<?=Kohana::VERSION?></span>
            </div>
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">
                <span class="text-muted pull-right">2014-<?=date('Y');?> &copy;</span>
            </div>
        </div>

    </div>
</footer>

</body>
</html>