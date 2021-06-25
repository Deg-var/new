<?php use yii\helpers\Url;
use yii\widgets\LinkPager;?>
<section class="categories categories-grid spad">
        <div class="categories__post">
            <div class="container">
                <div class="categories__grid__post">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="breadcrumb__text">
                                <h2>Категория: <span><?= $category->title;?></span></h2>
                                
                            </div>
                            <div class="container">
                                <div class="col-lg-12 ">
                                    <?php foreach($articles as $article):?>
                                        <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>">
                                            <div class="sidebar__feature__item__large set-bg"
                                    data-setbg="<?= $article->getImage() ?>">
                                    
                                </div><div class="sidebar__item__title row container-fuid">
                                        <div class="col-9"><h4><?= $article->title ?></h4>
                                        <h5><?= $article->description ?></h5>
                                        </div><h5 class="col-3  pull-bottom"><?= $article->getDate() ?>
                                        
                                    </div></a>
                                    <?php endforeach;?>
                                </div><<div class="row justify-content-center">
                <?php echo LinkPager::widget([
    'pagination' => $pagination,
]);?></div>
                            </div>
                        </div>
                        <?= $this->render('/partials/sidebar',['popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'tags'=>$tags,])?>
                    </div>
                </div>
            </div>
        </div>
    </section>