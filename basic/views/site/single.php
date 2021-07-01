<?php

use app\models\Article;
use yii\base\Widget;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Comment;
use phpDocumentor\Reflection\Location;

?>
<section class="categories categories-grid spad container"><div class="row"><section class="single-post spad col-8">
        <img class="single-post__hero" src="<?= $article->getImage() ?>">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="single-post__title">
                        <div class="single-post__title__text">
                            <ul class="label">
                                <li>
                                <?php if ($article->category_id):?>
                                категория: <a href="<?= Url::toRoute(['site/category','id'=>$article->category->id])?>">
                                <?= $article->category->title;?>
                                </a>
                                <?php else:?>(без категории)<?php endif;?>
                                </li>
                                
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
    <?php if ($comment->user_id):?>
                        <div class="single-post__comment__item container">
                            <div class="single-post__comment__item__text">
                                <h5><?= $comment->user->name?></h5>
                                <span><?= $comment->getDate()?></span>
                                <div class="text-break"><p><?= $comment->text;?></p></div>
                                
                            </div>
                        </div>
                        <?php else:?>
                            <div class="single-post__comment__item container">
                            <div class="single-post__comment__item__text">
                                <h5>гость</h5>
                                <span><?= $comment->getDate()?></span>
                                <div class="text-break"><p><?= $comment->text;?></p></div>
                                
                            </div>
                        </div>
                        <?php endif;?>
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
            'categories'=>$categories,
            'popularcategories'=>$popularcategories,
            'users'=>$users,
            // 'tags'=>$tags,
            ])?>
            </section>