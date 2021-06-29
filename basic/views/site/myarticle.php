
<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>



<!-- Categories Section Begin -->

    <section class="categories spad">
        
        <div class="categories__post">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 row">
                        <div class="container">
            <div class="col-12">
            <?php foreach($articles as $article): ?>
            <?php if(Yii::$app->user->id==$article->user_id):?>
                <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>"><div class="col-12">
                    <div class="categories__item set-bg" data-setbg="<?= $article->getImage();?>">
                        <div class="categories__hover__text">
                            <h5><?= $article->title; ?></h5>
                            <p><?= $article->category_id; ?></p><br>
                            <p><?= $article->description;?> <?= $article->getDate() ?> </p>
                            <p>Просмотры: <?= (int) $article->viewed ?></p>
                        </div>
                    </div>
                </div></a>
                <?php endif;?>
                <?php endforeach; ?>
            </div><div class="row justify-content-center">
                <?php echo LinkPager::widget([
    'pagination' => $pagination,
]); ?></div><?php ;?>
        </div>
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
    </section>
    <!-- Categories Section End -->