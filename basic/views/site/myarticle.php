
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
                        <h5>Сортировать по: <?php echo $sort->link('date');?></h5><br>
            <div class="col-12">
            <?php foreach($articles as $article): ?>
            
                <div class="row">
                    <img class="categories__item col-5" src="<?= $article->getImage();?>">
                    <div class="categories__hover__text col-7">
                                            <h5><?= $article->title;?></h5>
                                            <p>
                                                <?php if ($article->category_id):?>
                                                <p>Категория: <?= $article->category->title; ?></p>
                                                <?php else:?>
                                                (БЕЗ КАТЕГОРИИ)
                                                <?php endif;?>
                                            </p>
                                            <div class="text-break"><?= $article->description?></div>
                                            <div class="text-break">Автор: <?= $article->author->name; ?></div> 
                                            <div class="text-break"><?= $article->getDate() ?></div>
                                            <div class="text-break">Просмотры: <?= (int) $article->viewed ?></div>
                            <?php if ($article->status==2):?>
                                <h5>Эта статья опубликована</h5>        
            <div class="btn btn-secondary">Публикуй</div>
            <a class="btn btn-primary" href="<?= Url::toRoute(['redact', 'id'=>$article->id]);?>">Радектировать</a>
            <a class="btn btn-warning" href="<?= Url::toRoute(['disallow', 'id'=>$article->id]);?>">Черновик</a>
                <?php else:?>
                    <h5>Эта статья-черновик</h5>
    <a class="btn btn-success" href="<?= Url::toRoute(['allow', 'id'=>$article->id]);?>">Публикуй</a>
    <a class="btn btn-primary" href="<?= Url::toRoute(['redact', 'id'=>$article->id]);?>">Радектировать</a>
    <div class="btn btn-secondary">Черновик</div>

            
            <?php endif;?>
                            <div class="text-break">Автор: <?= $article->author->name; ?></div> 
                            <div class="text-break"><?= $article->getDate() ?></div>
                            <div class="text-break">Просмотры: <?= (int) $article->viewed ?></div>
                            <a href="<?= Url::toRoute(['site/redact','id'=>$article->id]);?>" class="btn btn-warning">Редактировать</a>
                <a href="<?= Url::toRoute(['site/view','id'=>$article->id]);?>" class="btn btn-secondary">Посмотреть</a>
                        </div>
                    
                </div>
                
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