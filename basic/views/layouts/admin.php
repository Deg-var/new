<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\MyAsset;
use app\models\User;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;




MyAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-2 p-0">
                    <?php if(Yii::$app->user->id):?>
                    <?php if(Yii::$app->user->identity->isAdmin):?>
                    
                    <h5>
                                <div class="d-flex">
                        <a href="/admin" class="primary-btn" style="margin: 10px 10px;">Админка</a>
                                </div><?php else:?>
                                <h5>
                                <div class="d-flex p-0">
                        <a href="<?= Url::toRoute(['site/myarticle','id'=>Yii::$app->user->id])?>" class="primary-btn px-4" style="margin: 10px 10px;">Мои статьи</a>
                                </div></h5>
                            </h5><?php endif;?>
                            <?php else:?>
                            <?php endif;?>
                    </div>
                    <div class="col-8">
    <nav class="header__menu">
                            <ul>
                                <li class=""><a href="/site/index">На сайт</a></li>
                                
                                <li class=""><a href="/admin/article/index">Статьи</a></li>
                                <!-- <li class=""><a href="/site/tags">Теги</a></li> -->
                                <li class=""><a href="/admin/category/index">Категории</a></li>
                                <li class=""><a href="/admin/comment/index">Коментарии</a></li>
                
                            </ul>
                        </nav>
                    </div>
                    <div class="col-2 ">
                    <div class="row container align-middle">
                        <div class="header__search col-6 ">
                            <i class="fa fa-search search-switch"></i>
                        </div>
                        <ul class="col-6 pull-right align-middle" style="list-style-type:none;color:black;">
                        <?php if(Yii::$app->user->isGuest):?>
                        <li><h5><a href="<?= Url::toRoute(['auth/login'])?>" style="color:black;">LOGIN</a></h5></li>
                        <li><h5><a href="<?= Url::toRoute(['auth/signup'])?>" style="color:black;">REGISTER</a></h5></li>
                        <?php else:?>
                            <li><h5><a href="<?= Url::toRoute(['auth/logout'])?>"  style="color:black;"><?= 'LOGOUT (' . Yii::$app->user->identity->email . ')'?></a></h5></li>
                        <?php endif;?>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <div class="col-lg-3 col-md-3">
            <?php if(!Yii::$app->user->isGuest):?>
            <h5>
                                <div class="header__btn">
                        <a href="/site/new" class="primary-btn">Создать статью</a>
                                </div>
                            </h5>
                            <?php endif;?>
                </div>
                <div class="col-lg-6 col-md-6">
                <div class="header__logo">
                        <a href="./index.html"><img src="/blog/img/logo.png" height="100" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-envelope-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <div class="container">
    <?= $content ?>
    </div>
    <!-- Hero Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="footer__instagram">
                
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__text">
                        <div class="footer__logo">
                            <a href="#"><img src="/blog/img/logo.png" height="80" alt=""></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut<br /> labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                            commodo viverra<br /> maecenas accumsan lacus vel facilisis. </p>
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-envelope-o"></i></a>
                        </div>
                    </div>
                    <div class="footer__copyright">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->


<?php $this->endBody() ?>
<?= $this->registerJsFile('/ckeditor/ckeditor.js');?>
<?= $this->registerJsFile('/ckfinder/ckfinder.js');?>
<script>
$(document).ready(function(){
    var editor = CKEDITOR.replace('article-description');
    var editor = CKEDITOR.replace('article-content');
    CKfinder.setupCKeditor(editor);
    })
</script>
</body>
</html>
<?php $this->endPage() ?>