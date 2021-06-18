<?php
namespace app\controllers;



use Yii;
use app\models\LoginForm;
use app\models\SignupForm;
use yii\web\Controller;
use app\models\User;




class AuthController extends Controller{
public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('/auth/login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionSignup()
    {
        $model= new SignupForm();
        if(Yii::$app->request->isPost)
        { 
            $model->load(Yii::$app->requst->post());
            if($model->signup())
            {return $this->redirect(['auth/login']);}
        }
        return $this->render('signup',['model'=>$model]);
    }
public function actionLoginVK($uid, $first_name,$photo)
{
            $user=new User();
            if($user->saveFromVk($uid,$first_name,$photo))
            {
                return $this->redirect(['site/index']);
            }
}
}