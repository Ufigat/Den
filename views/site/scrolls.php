<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="site-about">
    <h3>Тренер по категориям</h3>
    <table style="width:100%">
        <tr>
            <th>Имя</th>
            <th>Тип</th>
            <th>Категория</th>
        </tr>
        <?php 
        foreach($scrolls as $scroll): ?>
        <tr>
            <td><?= $scroll["full_name"]?></td>
            <td><?= $scroll["type"]?></td>
            <td><?= $scroll["category"]?></td>
        </tr>
        <?php endforeach; ?>
</div>
