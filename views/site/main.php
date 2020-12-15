<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="site-about">
    <br>
    <h3>1 Поиск туристов по секции</h3>
    <div class="frfads">
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($FoundSection, 'text') ?>
            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>    
    <br>
    <h3>2 Список тренеров</h3>
    <div class="frfads">   
    <table style="width:100%">
        <tr>
            <th>Имя</th>
            <th>Год рождения</th>
            <th>Пол</th>
            <th>Зарплата в час</th>
            <th>Специализация</th>
        </tr>   
        <?php 
        foreach($Trainers as $trainer): ?>
        <tr>
            <td><?= $trainer["full_name"]?></td>
            <td><?= $trainer["year_of_birth"]?></td>
            <td><?= $trainer["gender"]?></td>
            <td><?= $trainer["wage"]?></td>
            <td><?= $trainer["specialization"]?></td>
        </tr>
        <?php endforeach; ?> 
        </table>  
    </div>    
    <h3>3 Список соревнований</h3>
    <div class="frfads">   
    <table style="width:100%">
        <tr>
            <th>Соревнования</th>
            <th>Спортсмен</th>
            <th>Секция</th>
        </tr>
        <?php 
        foreach($Сompetitions as $сompetition): ?>
        <tr>
            <td><?= $сompetition["competition"]?></td>
            <td><?= $сompetition["people"]?></td>
            <td><?= $сompetition["section"]?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div> 
    <h3>4 Список тpенеpов, проводивших тpениpовки в указанной группе</h3>
    <div class="frfads">
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($FoundParty, 'text') ?>
            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div> 
    <h3>5 Список туристов длинный</h3>
    <div class="frfads">   
    <table style="width:100%">
        <tr>
            <th>Имя</th>
            <th>Тип</th>
            <th>Дата рождения</th>
            <th>Пол</th>
            <th>Категория</th>
            <th>Группа</th>
            <th>Секция</th>
            <th>Остановки</th>
            <th>Количество походов</th>
        </tr>
        <?php 
        foreach($Long as $longer): ?>
        <tr>
            <td><?= $longer["full_name"]?></td>
            <td><?= $longer["type"]?></td>
            <td><?= $longer["year_of_birth"]?></td>
            <td><?= $longer["gender"]?></td>
            <td><?= $longer["category"]?></td>
            <td><?= $longer["party"]?></td>
            <td><?= $longer["section"]?></td>
            <td><?= $longer["points"]?></td>
            <td><?= $longer["hike_count"]?></td>            
        </tr>
        <?php endforeach; ?>
    </table>
    </div> 
    <h3>6 Список руководителей секций полностью</h3>
    <div class="frfads">   
    <table style="width:100%">
        <tr>
            <th>Имя</th>
            <th>Дата рождения</th>
            <th>Пол</th>
            <th>Заработная плата</th>
            <th>Начало работы</th>
        </tr>
        <?php 
        foreach($Leaders as $leader): ?>
        <tr>
            <td><?= $leader["full_name"]?></td>
            <td><?= $leader["year_of_birth"]?></td>
            <td><?= $leader["gender"]?></td>
            <td><?= $leader["wage"]?></td>
            <td><?= $leader["begin"]?></td>            
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <h3>7 Получить нагрузку тpенеpов (вид занятий, количество часов), ее объем по определенным видам занятий и общую нагрузку за указанный период времени для данного тpенеpа или указанной секции. </h3>
    <div class="frfads">
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($FoundLoad, 'party') ?>
            <?= $form->field($FoundLoad, 'date_start')->textInput(["type" => "date"]) ?>
            <?= $form->field($FoundLoad, 'date_end')->textInput(["type" => "date"]) ?>
            <?= $form->field($FoundLoad, 'trainer') ?>
            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
    <h3>9 Получить перечень и общее число маpшpутов, которые проходят через некоторую точку, имеют длину больше указанной, могут удовлетворять заданной категории сложности. </h3>
    <div class="frfads">
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($FoundPoints, 'point') ?>
            <?= $form->field($FoundPoints, 'length') ?>
            <?= $form->field($FoundPoints, 'complexity') ?>
            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
    <h3>10 Получить перечень и общее число туристов</h3>
    <div class="frfads">   
    <table style="width:100%">
        <tr>
            <th>Имя</th>
            <th>Тип</th>
            <th>Группа</th>
            <th>Секция</th>
            <th>Название маршрута</th>
        </tr>
        <?php 
        foreach($Tourists_count as $tourists_count): ?>
        <tr>
            <td><?= $tourists_count["full_name"]?></td>
            <td><?= $tourists_count["type"]?></td>
            <td><?= $tourists_count["party"]?></td>
            <td><?= $tourists_count["section"]?></td>
            <td><?= $tourists_count["name"]?></td>            
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <br>
    <h3>11 Получить перечень инстpуктоpов, которые имеют определенную категорию, ходили в определенный поход, ходили по некоторому маpшpуту, были в указанной точке </h3>
    <div class="frfads">
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($FoundScroll, 'category') ?>
            <?= $form->field($FoundScroll, 'hike') ?>
            <?= $form->field($FoundScroll, 'route') ?>
            <?= $form->field($FoundScroll, 'points') ?>
            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
    <br>
    <h3>12 Список туристов из секции, группы, которые ходили в походы со своим тpенеpом в качестве инстpуктоpа</h3>
    <div class="frfads">   
    <table style="width:100%">
        <tr>
            <th>Имя</th>
            <th>Тип</th>
            <th>Группа</th>
            <th>Секция</th>
            <th>Название маршрута</th>
        </tr>
        <?php
        foreach($Tourists12 as $tourists12): ?>
        <tr>
            <td><?= $tourists12["full_name"]?></td>
            <td><?= $tourists12["type"]?></td>
            <td><?= $tourists12["party"]?></td>
            <td><?= $tourists12["section"]?></td>
            <td><?= $tourists12["name"]?></td>            
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <h3>13 Список туристов по маршрутам</h3>
    <div class="frfads">
        <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($FoundRouts, 'text') ?>
            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div> 
    
</div> 
