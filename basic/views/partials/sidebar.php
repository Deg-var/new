<?php 
use yii\helpers\Url;
?>
<div class="col-4">
                        <div class="sidebar__item">
                            <div class="sidebar__about__item">
                                <div class="sidebar__item__title">
                                    <h6>Популярное</h6>
                                </div>
                                    <div class="sidebar__feature__item__list">
                                        <?php foreach ($popular as $article): ?>
                                            <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>">
                                            <div class="sidebar__feature__item__large set-bg"
                                    data-setbg="<?= $article->getImage() ?>">
                                    
                                </div><div class="sidebar__item__title">
                                        <span><?= $article->title ?></span>
                                        <h5><a href="#"><?= $article->description ?></a></h5>
                                        
                                    </div></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="sidebar__about__item">
                                <div class="sidebar__item__title">
                                    <h6>новое</h6>
                                </div>
                                    <div class="sidebar__feature__item__list">
                                        <?php foreach ($recent as $article): ?>
                                            <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>">
                                            <div class="sidebar__feature__item__large set-bg"
                                    data-setbg="<?= $article->getImage() ?>">
                                    <div class="sidebar__feature__item__large--text">
                                        <span><?= $article->title ?></span>
                                        <h5><?= $article->description ?></h5>
                                        <h5 class="pull-right"><?= $article->getDate() ?></h5>
                                    </div>
                                </div></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="sidebar__about__item">
                                <div class="sidebar__item__title">
                                    <h6>Категории</h6>
                                </div>
                                    <div class="item__list">
                                        <ul class="sidebarm">
                                        <?php foreach ($categories as $category): ?>
                                            <p><a href="<?= Url::toRoute(['site/category','id'=>$category->id])?>"><li>
                                                <?= $category->title ?>
                                                <span class="pull-right">
                                                    (<?=$category->getArticlesCount();?>)</span>
                                                </li></a></p>
                                    <?php endforeach; ?>
                                        </ul>
                                </div>
                            </div>
                            <div class="sidebar__about__item">
                                <div class="sidebar__item__title">
                                    <h6>Теги</h6>
                                </div>
                                    <div class="item__list">
                                        <ul class="sidebarm">
                                        <?php foreach ($tags as $tag): ?>
                                            <p><a href="<?= Url::toRoute(['site/tags','id'=>$tag->id])?>"><li>
                                                <?= $tag->title ?>
                                                <span class="pull-right">
                                                    (<?=$tag->getArticlesCount();?>)</span>
                                                </li></a></p>
                                    <?php endforeach; ?>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>