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
                                <li class=""><p>Редактирование содержимого статьи: <a><?= $article->title;?></a></p></li>
                            </ul>
                        </nav>
    <?php $form = ActiveForm::begin(); ?>

    <h5><?= $form->field($model, 'title',)->textInput(['maxlength' => true,'value'=>$article->title])->label('Название') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6,'value'=>$article->description])->label('Краткое описание') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6, 'value'=>$article->content])->label('Содержание') ?></h5>
    <div class="article-form">
    
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success','style'=>'font-size:20px;', 'href'=>'/site/preview']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>


