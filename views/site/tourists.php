<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="site-about">
    <h3>Туристы</h3>
    <table style="width:100%">
        <tr>
            <th>Имя</th>
            <th>Тип</th>
            <th>Пол</th>
            <th>Категория</th>
            <th>Группа</th>
            <th>Секция</th>
        </tr>
        <?php 
        foreach($tourists as $tourist): ?>
        <tr>
            <td><?= $tourist["full_name"]?></td>
            <td><?= $tourist["type"]?></td>
            <td><?= $tourist["gender"]?></td>
            <td><?= $tourist["category"]?></td>
            <td><?= $tourist["party"]?></td>
            <td><?= $tourist["section"]?></td>
        </tr>
        <?php endforeach; ?>
</div>
