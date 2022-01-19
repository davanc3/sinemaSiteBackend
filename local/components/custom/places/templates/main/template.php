<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
if (isset($arResult['SEANCE'])) {
    $GLOBALS['APPLICATION']->RestartBuffer();
}
?>
    <table>
        <?php
        for ($i = 1; $i <= 10; $i++) {
        ?>
            <tr>
                <td><?= $i ?></td>
                <?php
                for ($j = 1; $j <= 10; $j++) {
                ?>
                <td>
                    <label class="check">
                        <input class="seancePlace" type="checkbox" data-row="<?= $i ?>" data-place="<?= $j ?>"
                        <?php
                            foreach($arResult['ITEMS'] as $arItem) {
                                if ($arItem['PROPERTY_ROW_VALUE'] == $i && $arItem['PROPERTY_PLACE_VALUE'] == $j) {
                                    echo('disabled');
                                    break;
                                }
                            }
                        ?>>
                        <span class="checkbox"><?= $j ?></span>    
                    </label> 
                </td>
                <?php
                }
                ?>
            </tr>
        <?php
        }
        ?>                                     
    </table>                     


<?php
if (isset($arResult['SEANCE'])) {
    die;
}