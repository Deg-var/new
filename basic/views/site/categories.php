<?php use yii\helpers\Url;?>

<section class="categories categories-grid spad">
        <div class="categories__post">
            <div class="container">
                <div class="categories__grid__post">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="breadcrumb__text">
                                <h2>Все категории</h2>
                            </div>
                            <?php foreach($categories as $category):?>
                            <div class="categories__list__post__item">
                                <div class="row">
                                    
                                    <div class="col-lg-12 col-md-12">
                                        <div class="categories__post__item__text">
                                            <a href="<?= Url::toRoute(['site/category','id'=>$category->id]);?>"><span class="post__label"><?= $category->title ?></span></a>
                                            <h3></h3>
                                            <ul class="post__widget">
                                                <li>Статей в категории: <?=$category->getArticlesCount();?> </li>
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
            'popularcategories'=>$popularcategories,
            'users'=>$users,
            // 'tags'=>$tags,
            ])?>
                    </div>
                </div>
            </div>
        </div>
    </section>