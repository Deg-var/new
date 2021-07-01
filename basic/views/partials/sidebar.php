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
                                        <h4><?= $article->title ?></h4>
                                        <h5><div class="text-break"><?= $article->description?></div></h5>
                                        
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
                                            <img class="sidebar__feature__item__large col-4"src="<?= $article->getImage() ?>">
                                    <div class="sidebar__feature__item__large--text col-8">
                                        <h4><?= $article->title ?></h4>
                                        <h5><div class="text-break text-truncate"><?= $article->description?></div></h5>
                                        <h5 class="pull-right"><?= $article->getDate() ?></h5>
                                    </div>
                                </a><?php endif;?>
                                    <?php endforeach; ?>
                                </div>
                            <div class="sidebar__about__item">
                                <div class="sidebar__item__title">
                                    <h6>Категории</h6>
                                </div>
                                    <div class="item__list">
                                        <ul class="sidebarm">
                                        <?php foreach ($popularcategories as $popularcategory): ?>
                                        <?php if($popularcategory->getArticlesCount()>0):?>
                                            <p><a href="<?= Url::toRoute(['/site/category','id'=>$popularcategory->id])?>"><li>
                                                <?= $popularcategory->title ?>
                                                <span class="pull-right">
                                                    (<?=$popularcategory->getArticlesCount();?>)</span>
                                                </li></a></p>
                                                <?php endif;?>
                                    <?php endforeach; ?>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>