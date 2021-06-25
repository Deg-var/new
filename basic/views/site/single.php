<?php

use app\models\Article;
use yii\base\Widget;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Comment;
?>
<section class="categories categories-grid spad container"><div class="row"><section class="single-post spad col-8">
        <div class="single-post__hero set-bg" data-setbg="<?= $article->getImage();?>"></div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="single-post__title">
                        <div class="single-post__title__meta">
                            
                        </div>
                        <div class="single-post__title__text">
                            <ul class="label">
                                <li><a href="<?= Url::toRoute(['site/category','id'=>$article->category_id])?>">
                                <?= $article->category_id;?>321321</li></a>
                                
                            </ul>
                            <h4><?= $article->title;?></h4>
                            <ul class="widget">
                                <li>От <?= $article->author->name;?></li>
                            </ul>
                        </div>
                    </div>
                   
                    <div class="single-post__top__text">
                        <p><?= $article->content;?> </p><h5 class="pull-right"><?= $article->getDate();?></h5>
                    </div>
                    <div class="single-post__comment">
                        <div class="widget__title">
                            <h4> Комментарии</h4>
                        </div>
<?php if(!empty($comments)):?>
    <?php foreach($comments as $comment):?>
                        <div class="single-post__comment__item">
                            <div class="single-post__comment__item__pic">
                                <img src="<?= $comment->user->image?>" alt="">
                            </div>
                            <div class="single-post__comment__item__text">
                                <h5><?= $comment->user->name?></h5>
                                <span><?= $comment->getDate()?></span>
                                <p><?= $comment->text;?></p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-share-square-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
<?php endforeach;?>
<?php endif;?>
                    </div>
                    <?= $this->render('/partials/comment',[
                        'article'=>$article,
                        'comments'=>$comments,
                        'commentForm'=>$commentForm,
                        
                    ]);
                    ?>
                </div>
                
            </div>
        </div>
    </section>
    <?= $this->render('/partials/sidebar',['popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,])?></section>