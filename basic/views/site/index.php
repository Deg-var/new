
<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
use app\models\Article;
?>



<!-- Categories Section Begin -->


<?php echo(Yii::$app->user->id);?>
    <section class="categories spad">
        
        <div class="categories__post">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 row">
                        <div class="container">
            <div class="col-12">
            <h5><?php echo $sort->link('user_id') . ' | ' . $sort->link('date');?></h5>
            <?php foreach($articles as $article): ?>
                <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>"><div class="col-12">
                    <div class="categories__item set-bg" data-setbg="<?= $article->getImage();?>">
                        <div class="categories__hover__text">
                            <h5><?= $article->title;?></h5>
                            <p><?php if ($article->category_id):?>
                            <p>Категория: <?= $article->category->title; ?></p>
                            <?php else:?>
                            (БЕЗ КАТЕГОРИИ)
                            <?php endif;?></p><br>
                            <p>Автор: <?= $article->author->name; ?></p><br>
                            <p><?= $article->description;?> <?= $article->getDate() ?> </p>
                            <p>Просмотры: <?= (int) $article->viewed ?></p>
                        </div>
                    </div>
                </div></a>
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
            'users'=>$users,
            'popularcategories'=>$popularcategories,
            // 'tags'=>$tags,
            ])?>
             </div>
    </section>
    <!-- Categories Section End -->