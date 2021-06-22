<?php

use yii\base\Widget;
use yii\helpers\Url;
use yii\widgets\ActiveForm;?>
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
                                <li><a href="<?= Url::toRoute(['site/category','id'=>$article->category->id])?>">
                                <?= $article->category->title;?></li></a>
                                
                            </ul>
                            <h4><?= $article->title;?></h4>
                            <ul class="widget">
                                <li>by Admin</li>
                                <li>3 min read</li>
                                <li>20 Comment</li>
                            </ul>
                        </div>
                    </div>
                   
                    <div class="single-post__top__text">
                        <p><?= $article->content;?> </p><h5 class="pull-right"><?= $article->getDate();?></h5>
                    </div>
                    <div class="single-post__author__profile">
                        <div class="single-post__author__profile__pic">
                            <img src="/blog/img/categories/single-post/author-profile.jpg" alt="">
                        </div>
                        <div class="single-post__author__profile__text">
                            <h4>Lena Mollein.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <div class="single-post__author__profile__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="single-post__comment">
                        <div class="widget__title">
                            <h4> Comment</h4>
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
                    echo date('Y-m-d H:i:s')?>
                </div>
                
            </div>
        </div>
    </section>
    <?= $this->render('/partials/sidebar',['popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,])?></section>