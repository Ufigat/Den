<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="site-about">
    <h3>Тренеры</h3>
    <table style="width:100%">
        <tr>
            <th>Имя тренераы</th>
            <th>Место</th>
            <th>Секция</th>
            <th>Дата</th>
            <th>Время начала</th>
            <th>Часы</th>
        </tr>
        <?php 
        foreach($trainers as $trainer): ?>
        <tr>
            <td><?= $trainer["full_name"]?></td>
            <td><?= $trainer["place"]?></td>
            <td><?= $trainer["name"]?></td>
            <td><?= $trainer["date"]?></td>
            <td><?= $trainer["time"]?></td>
            <td><?= $trainer["hour"]?></td>
        </tr>
        <?php endforeach; ?>
</div>
