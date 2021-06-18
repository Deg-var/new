<?php use yii\helpers\Url;?>
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
                            <h4>03 Comment</h4>
                        </div>
                        <div class="single-post__comment__item">
                            <div class="single-post__comment__item__pic">
                                <img src="/blog/img/categories/single-post/comment/comment-1.jpg" alt="">
                            </div>
                            <div class="single-post__comment__item__text">
                                <h5>Brandon Kelley</h5>
                                <span>15 Aug 2017</span>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore
                                    magnam.</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-share-square-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-post__comment__item single-post__comment__item--reply">
                            <div class="single-post__comment__item__pic">
                                <img src="/blog/img/categories/single-post/comment/comment-2.jpg" alt="">
                            </div>
                            <div class="single-post__comment__item__text">
                                <h5>Brandon Kelley</h5>
                                <span>15 Aug 2017</span>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore
                                    magnam.</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-share-square-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-post__comment__item">
                            <div class="single-post__comment__item__pic">
                                <img src="/blog/img/categories/single-post/comment/comment-3.jpg" alt="">
                            </div>
                            <div class="single-post__comment__item__text">
                                <h5>Brandon Kelley</h5>
                                <span>15 Aug 2017</span>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore
                                    magnam.</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="#"><i class="fa fa-share-square-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-post__leave__comment">
                        <div class="widget__title">
                            <h4>Оставьте коментарий</h4>
                        </div>
                        <form action="#">
                            
                            <textarea placeholder="Ваш коментарий"></textarea>
                            <button type="submit" class="site-btn">Submit</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <?= $this->render('/partials/sidebar',['popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,])?></section>