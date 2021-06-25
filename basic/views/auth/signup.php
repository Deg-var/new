<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- Sign In Section Begin -->
    <div class="signin">
        <div class="signin__warp">
            <div class="signin__content">
                <div class="signin__logo">
                    <a href="#"><img src="img/siign-in-logo.png" alt=""></a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt labore dolore
                    magna aliqua viverra.</p>
                <div class="signin__form">
                    <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                            <a class="nav-link active"  href="/auth/signup">
                                Sign up
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/auth/login" >
                                Sign in
                            </a>
                        </li>
                        <li class="nav-item">
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="signin__form__text">
                                
                                <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        
        'fieldConfig' => [
            'template' => "{label}\n<div>{input}</div>\n<div>{error}</div>",
            
        ],
    ]); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

                <?= Html::submitButton('Register Now', ['class' => 'site-btn', 'name' => 'login-button']) ?>
           
    <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In Section End -->