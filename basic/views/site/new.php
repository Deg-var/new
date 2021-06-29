<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\controllers\ArticleController;


/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container">
<nav class="header__menu">
                            <ul>
                                <li class=""><a>новая статья</a></li>
                            </ul>
                        </nav>
    <?php $form = ActiveForm::begin(); ?>

    <h5><?= $form->field($model, 'title',)->textInput(['maxlength' => true])->label('Название') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Краткое описание') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])->label('Содержание') ?></h5><div class="article-form">
    
    <div class="form-group">
        <?= Html::submitButton('Спаси и сохрани', ['class' => 'btn btn-success','style'=>'font-size:20px;', 'href'=>'/site/preview']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


