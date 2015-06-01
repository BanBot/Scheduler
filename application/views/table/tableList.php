<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by PhpStorm.
 * User: Phantom
 * Date: 01.06.2015
 * Time: 3:34
 */
?>
<ul>
    <?php foreach ($arrTables as $index=>$arrName):?>
        <li><a href="/table/view?table=<?php echo $arrName['uri']?>"><?php echo $arrName['name'] ?></a></li>
    <?php endforeach?>
</ul>