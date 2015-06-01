<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by PhpStorm.
 * User: Phantom
 * Date: 01.06.2015
 * Time: 3:57
 */
?>
<table class="table">
    <thead>
    <tr>
        <?php foreach($arrRows[0] as $colName=>$value):?>
        <th>
        <?php echo $colName; ?>
        </th>
        <?php endforeach ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach($arrRows as $arrRow):?>
    <tr>
        <?php foreach($arrRow as $colName=>$value):?>
        <td>
            <?php echo $value; ?>
        </td>
        <?php endforeach ?>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>

<pre><?php var_export($arrCols) ?></pre>