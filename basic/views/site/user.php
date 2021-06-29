<?php use yii\helpers\Url;
use yii\widgets\LinkPager;?>
<section class="categories categories-grid spad">
        <div class="categories__post">
            <div class="container">
                <div class="categories__grid__post">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="breadcrumb__text">
                                <h2> Автор: <span><?= $user->id;?></span></h2>
                                
                            </div>
                            <div class="container">
                                <div class="col-lg-12 ">
                                    <?php foreach($articles as $article):?>
                                        <?php if ($article->status===2):?>
                                        <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>" class="row">
                                            <img class="sidebar__feature__item__large2 col-4"
                                    src="<?= $article->getImage() ?>">
                                    
                                <div class="sidebar__item__title row container-fuid col-8">
                                        <div class="col-9"><h4><?= $article->title ?></h4>
                                        <h5><?= $article->description ?></h5>
                                        </div><h5 class="col-3  pull-bottom"><?= $article->getDate() ?>
                                        
                                    </div></a>
                                    <?php endif;?>
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
            'popularcategories'=>$popularcategories,
            'users'=>$users,
            // 'tags'=>$tags,
            ])?>
                    </div>
                </div>
            </div>
        </div>
    </section>