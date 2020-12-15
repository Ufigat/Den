<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="site-about">
    <h3>Туристы по маршрутам</h3>
    <table style="width:100%">
        <tr>
            <th>Имя</th>
            <th>Место</th>
            <th>Группа</th>
            <th>Количество часов</th>
        </tr>
        <?php
        var_dump($loads);
        foreach($loads as $load): ?>
        <tr>
            <td><?= $load["full_name"]?></td>
            <td><?= $load["place"]?></td>
            <td><?= $load["name"]?></td>
            <td><?= $load["loading"]?></td>
        </tr>
        <?php endforeach; ?>
</div>
