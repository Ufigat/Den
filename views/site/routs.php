<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="site-about">
    <h3>Туристы по маршрутам</h3>
    <table style="width:100%">
        <tr>
            <th>Имя</th>
            <th>Тип</th>
            <th>Группа</th>
            <th>Секция</th>
            <th>Название маршрута</th>
        </tr>
        <?php
        foreach($routs as $rout): ?>
        <tr>
            <td><?= $rout["full_name"]?></td>
            <td><?= $rout["type"]?></td>
            <td><?= $rout["party"]?></td>
            <td><?= $rout["section"]?></td>
            <td><?= $rout["name"]?></td>
        </tr>
        <?php endforeach; ?>
</div>
