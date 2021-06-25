<div class="single-post__leave__comment">
                        <div class="widget__title">
                            <h4>Оставьте комментарий</h4>
                        </div>
                        <?php if  (Yii::$app->session->getFlash('comment')): ?>
                            <div class="alert" role="alert"><?=Yii::$app->session->getFlash('comment')?></div>
                            <?php endif;?>
                       <?php $form=\yii\widgets\ActiveForm::begin([
                           'action'=>['site/comment', 'id'=>$article->id],
                           'options'=>['role'=>'form']])?>
                        <?= $form->field($commentForm,'comment')->textarea([
                            'placeholder'=>'Ваш комментарий'])->label(false)?>
                            
                            <button type="submit" class="site-btn">Отправить</button>
                            <?php \yii\widgets\ActiveForm::end()?>
                    </div>