<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="site-about">
    <h3>Походы</h3>
    <table style="width:100%">
        <tr>
            <th>ID Похода</th>
            <th>Дистанция</th>
            <th>Точки</th>
            <th>Сложность</th>
        </tr>
        <?php
        foreach($points as $point): ?>
        <tr>
            <td><?= $point["id"]?></td>
            <td><?= $point["distance"]?></td>
            <td><?= $point["points"]?></td>
            <td><?= $point["complexity"]?></td>
        </tr>
        <?php endforeach; ?>
</div>
