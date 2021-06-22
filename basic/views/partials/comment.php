<div class="single-post__leave__comment">
                        <div class="widget__title">
                            <h4>Оставьте коментарий</h4>
                        </div>
                        <?php if  (Yii::$app->session->getFlash('comment')): ?>
                            <div class="alert" role="alert"><?=Yii::$app->session->getFlash('comment')?></div>
                            <?php endif;?>
                       <?php $form=\yii\widgets\ActiveForm::begin([
                           'action'=>['site/comment', 'id'=>$article->id],
                           'options'=>['role'=>'form']])?>
                        <?= $form->field($commentForm,'comment')->textarea([
                            'placeholder'=>'Write Massage'])->label(false)?>
                            
                            <button type="submit" class="site-btn">Submit</button>
                            <?php \yii\widgets\ActiveForm::end()?>
                    </div>