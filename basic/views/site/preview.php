<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Article;
use yii\base\Widget;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Comment;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<section class="categories categories-grid spad container"><div class="row"><section class="single-post spad col-8">
<?php if (!$article->image):?>
        <div class="single-post__hero  h-10 text-center">
            <?= Html::a('Set Image?', ['set-image', 'id' => $model->id], ['class' => 'btn btn-secondary align-baseline']) ?>
        </div>
        <?php else :?>
            <img class="single-post__hero set-bg" src="<?= $article->getImage();?>">
            <?php endif;?>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="single-post__title">
                        <div class="single-post__title__meta">
                            
                        </div>
                        <div class="single-post__title__text">
                            <ul class="label">
                                <li><?php if ($article->category):?><a href="<?= Url::toRoute(['site/category','id'=>$article->category->title])?>">
                                <?= $article->category->title;?></a><?php else:?><?= Html::a('Set Category', ['set-category', 'id' => $model->id], ['class' => 'btn btn-secondary']) ?><?php endif;?></li>
                                
                            </ul>
                            <h4><?= $article->title;?></h4>
                            <ul class="widget">
                                <li>От <?= $article->author->name;?></li>
                                <br><li>
                                <?php if (!$article->getSelectedTags()):?>
                                <?php else:?>
                                    <?php foreach($selectedTags as $selectedTag):?>
                                        <a href="<?= 
                                            Url::toRoute(['site/tags','id'=>$selectedTag])?>">
                                        <?= $selectedTag;?>
                                        </a>
                                    <?php endforeach;?></p><h5 class="pull-right"><?= $article->getDate();?><?php endif;?></li>
                                    <li><?= Html::a('Add Tags', ['set-tags', 'id' => $model->id], ['class' => 'btn btn-default']) ?></li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="single-post__top__text">
                        <p><?= $article->content;?> </p><h5 class="pull-right"><?= $article->getDate();?></h5>
                    </div>
                    </div>
                
            </div>
        </div>
    </section>
    <?= $this->render('/partials/sidebar',['popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'tags'=>$tags,
            ])?></section>
<div class="article-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Set Image', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    <?= Html::a('Set Category', ['set-category', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    <?= Html::a('Set Tags', ['set-tags', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?></p>
        <?php if ($model->category_id!=0):?><?= Html::a('Save', ['view', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                                <?php else:?><div class="btn btn-info">Установите категорию</div><?php endif;?>
                                
    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'content:ntext',
            'date',
            'image',
            'viewed',
            'user_id',
            'category_id',
        ],
    ]) ?>

</div>
