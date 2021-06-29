<?php use yii\helpers\Url;?>
<?php header('Location:/site/404');die;?>
<section class="categories categories-grid spad">
        <div class="categories__post">
            <div class="container">
                <div class="categories__grid__post">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="breadcrumb__text">
                                <h2>Все теги</h2>
                            </div>
                            <?php foreach($tags as $tag):?>
                            <div class="categories__list__post__item">
                                <div class="row">
                                    
                                    <div class="col-lg-12 col-md-12">
                                        <div class="categories__post__item__text">
                                            <a href="<?= Url::toRoute(['site/tag','id'=>$tag->id]);?>"><span class="post__label"><?= $tag->title ?></span></a>
                                            <h3></h3>
                                            <ul class="post__widget">
                                                <li>Статей с тегом: <?=$tag->getArticlesCount();?> </li>
                                            </ul>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php endforeach;?>
                        </div>
                        <?= $this->render('/partials/sidebar',[
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'tags'=>$tags,])?>
                    </div>
                </div>
            </div>
        </div>
    </section>