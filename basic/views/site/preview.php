<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Article;
use yii\base\Widget;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Comment;
use yii\web\User;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<section class="categories categories-grid spad container">
<div class="row">
<section class="single-post spad col-8">
<?php if (!$article->image):?>
        <div class="single-post__hero  h-10 text-center">
            <h4><?= Html::a('Загрузить изображение', ['set-image', 'id' => $model->id], ['class' => 'btn btn-primary align-baseline']) ?></h4>
        </div>
        <?php else :?>
            <div class="single-post__hero  h-10 text-center">
            <img class="single-post__hero set-bg" src="<?= $article->getImage();?>">
            <h4><?= Html::a('Изменить изображение', ['set-image', 'id' => $model->id], ['class' => 'btn btn-secondary align-baseline']) ?></h4>
            </div>
            <?php endif;?>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="single-post__title">
                        
                        <div class="single-post__title__text">
                            <ul class="label">
                                
                            <?php if ($article->category):?>
                                <li>Категория: <a href="<?= Url::toRoute(['site/category','id'=>$article->category->title])?>"></li>
                                
                                <li><?= $article->category->title;?></a><?= Html::a('Изменить категорию', ['set-category', 'id' => $model->id], ['class' => 'btn btn-secondary ml-5']) ?></li>
                                <?php else:?>
                                    <li><?= Html::a('Установить категорию', ['set-category', 'id' => $model->id], ['class' => 'btn btn-secondary']) ?></li>
                                <?php endif;?>
                                
                            </ul>
                            <h4><?= $article->title;?></h4>
                            <ul class="widget">
                                <li>Автор: <?= $article->author->name;?></li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="single-post__top__text">
                        <p><?= $article->content;?> </p><h5 class="pull-right"><?= $article->getDate();?></h5>
                    </div>
                    </div>
                
            </div>
        </div>
        <?php if (!$article->status==2):?>
            <h5>Эта статья-черновик</h5>
    <a class="btn btn-success" href="<?= Url::toRoute(['allow', 'id'=>$article->id]);?>">Публикуй</a>
    <a class="btn btn-primary" href="<?= Url::toRoute(['redact', 'id'=>$article->id]);?>">Радектировать</a>
    <div class="btn btn-secondary">Черновик</div>
                <?php else:?>
            <h5>Эта статья опубликована</h5>        
            <div class="btn btn-secondary">Публикуй</div>
            <a class="btn btn-primary" href="<?= Url::toRoute(['redact', 'id'=>$article->id]);?>">Радектировать</a>
            <a class="btn btn-warning" href="<?= Url::toRoute(['disallow', 'id'=>$article->id]);?>">Черновик</a>
            <?php endif;?>
            <a class="btn btn-danger" href="<?= Url::toRoute(['delete', 'id'=>$article->id]);?>">Удоли</a>
    </section>
    
    <?= $this->render('/partials/sidebar',['popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'popularcategories'=>$popularcategories,
            'users'=>$users,
            // 'tags'=>$tags,
            ])?></section>
