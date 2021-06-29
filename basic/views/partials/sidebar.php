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
                                        <?php if ($article->status===2):?>
                                            <a href="<?= Url::toRoute(['/site/view','id'=>$article->id]);?>" class="row">
                                            <img class="sidebar__feature__item__large col-4"
                                    src="<?= $article->getImage() ?>">
                                    
                                <div class="sidebar__item__title col-8">
                                        <span><?= $article->title ?></span>
                                        <h5><?= $article->description ?></h5>
                                        
                                    </div></a><?php endif;?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="sidebar__about__item">
                                <div class="sidebar__item__title">
                                    <h6>новое</h6>
                                </div>
                                    <div class="sidebar__feature__item__list">
                                        <?php foreach ($recent as $article): ?>
                                            <?php if ($article->status===2):?>
                                            <a href="<?= Url::toRoute(['/site/view','id'=>$article->id]);?>" class="row">
                                            <img class="sidebar__feature__item__large col-4"
                                    src="<?= $article->getImage() ?>">
                                    <div class="sidebar__feature__item__large--text col-8">
                                        <span><?= $article->title ?></span>
                                        <h5><?= $article->description ?></h5>
                                        <h5 class="pull-right"><?= $article->getDate() ?></h5>
                                    </div>
                                </a><?php endif;?>
                                    <?php endforeach; ?>
                                </div>
                            <div class="sidebar__about__item">
                                <div class="sidebar__item__title">
                                    <h6>Популярные категории</h6>
                                </div>
                                    <div class="item__list">
                                        <ul class="sidebarm">
                                        <?php foreach ($popularcategories as $popularcategory): ?>
                                            <p><a href="<?= Url::toRoute(['/site/category','id'=>$popularcategory->id])?>"><li>
                                                <?= $popularcategory->title ?>
                                                <span class="pull-right">
                                                    (<?=$popularcategory->getArticlesCount();?>)</span>
                                                </li></a></p>
                                    <?php endforeach; ?>
                                        </ul>
                                </div>
                            </div>
                            <div class="sidebar__about__item">
                                <div class="sidebar__item__title">
                                    <h6>Популярные Авторы</h6>
                                </div>
                                    <div class="item__list">
                                        <ul class="sidebarm">
                                        <?php foreach ($users as $user): ?>
                                            <p><a href="<?= Url::toRoute(['/site/user','id'=>$user->name])?>"><li>
                                                <?= $user->name ?>
                                                <span class="pull-right">
                                                    (<?=$user->getArticlesCount();?>)</span>
                                                </li></a></p>
                                    <?php endforeach; ?>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>