<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use app\models\ContactForm;
use app\models\Article;
use app\models\Category;
use app\models\Comment;
use app\models\CommentForm;
use app\models\Tag;
use app\models\ImageUpload;
use yii\helpers\ArrayHelper;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                
                'only' => ['login', 'logout', 'signup','new','confirm','setcategory','settags'],
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['new','setimage','confirm','setcategory','settags'],
                        'roles' => ['?'],
                        'matchCallback'=> function($rule,$action)
                        {
                        $this->redirect(['site/404']);
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout','new','setimage','confirm','setcategory','settags'],
                        'roles' => ['@'],
                    ],
                    
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        
        $data =Article::getAll();
        $popular= Article::getPopular();
        $recent =Article::getRecent();
        $categories=Category::getAll();
        $tags=Tag::getAll();

    return $this->render('index', [
         'articles' => $data['articles'],
         'pagination' => $data['pagination'],
         'popular'=>$popular,
         'recent'=>$recent,
         'categories'=>$categories,
         'tags'=>$tags,
    ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionArticleCreate()
    {
        return $this->render('articleCreate');
    }
    public function actionCategories()
    {
        
        $popular= Article::getPopular();
        $recent =Article::getRecent();
        $categories=Category::getAll();
        
        $commentForm = new CommentForm();
        
        $tags=Tag::getAll();
                
        return $this->render('categories',[
            
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'commentForm'=>$commentForm,
            'tags'=>$tags,]);
    }
    public function actionView($id)
    {
        $article= Article::findOne($id);
        $popular= Article::getPopular();
        $recent =Article::getRecent();
        $categories=Category::getAll();
        $comments=$article->getArticleComments();
        $commentForm = new CommentForm();
        $article->viewedCounter();
        $tags=Tag::getAll();
                
        return $this->render('single',[
            'article'=>$article,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'comments'=>$comments,
            'commentForm'=>$commentForm,
            'tags'=>$tags,
        ]);
    }
    public function actionTags()
    {
        $popular= Article::getPopular();
        $recent =Article::getRecent();
        $categories=Category::getAll();
        $commentForm = new CommentForm();
        $tags=Tag::getAll();
                
        return $this->render('tags',[
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'commentForm'=>$commentForm,
            'tags'=>$tags,]);
    }
    public function actionCategory($id)
    {
        $category= Category::findOne($id);
        $data = Category::getArticlesByCategory($id);
        $popular= Article::getPopular();
        $recent =Article::getRecent();
        $categories=Category::getAll();
        $tags=Tag::getAll();
    


        return $this->render('category', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'tags'=>$tags,
            'category'=>$category,
       ]);
    }
    public function actionTag($id)
    {
        $tag= Tag::findOne($id);
        $data = Category::getArticlesByCategory($id);
        $popular= Article::getPopular();
        $recent =Article::getRecent();
        $categories=Category::getAll();
        $tags=Tag::getAll();
    


        return $this->render('tag', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'tags'=>$tags,
            'tag'=>$tag,
       ]);
    }
    public function getComment()
    {
        return $this->hasMany(Comment::classname(),['article3_id'=>'id']);
    }
    public function actionComment($id)
    {
        $model=new CommentForm();
        if (Yii::$app->request)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('comment','otpravleno');
                return $this->redirect(['site/view','id'=>$id]);
            }
        }
    }
    public function actionNew()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->saveArticle()) {
            return $this->redirect(['confirm', 'id' => $model->id]);
        }else{

        return $this->render('new', [
            'model' => $model,
        ]);} 
    }
    public function actionConfirm($id)
    {
        return $this->render('confirm', [
            'model' => $this->findModel($id),
        ]);
    }
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        $this->redirect(['site/404']);
    }
    public function actionSetImage($id)
{
    
    $model = new ImageUpload;
    if (Yii::$app->request->isPost)
    {
        $article = $this->findModel($id);
        
        $file = UploadedFile::getInstance($model,'image');
       if($article->saveImage($model->uploadFile($file, $article->image)))
       {
           return $this->redirect(['confirm','id'=>$article->id]);
       }
    };
    return 
    $this-> render('image', ['model'=>$model]);
}
public function actionSetCategory($id)
{
    $article = $this->findModel($id);
    $selectedCategory=$article->category_id;
    $categories = ArrayHelper::map(Category::find()->all(), 'id', 'title');
    if (Yii::$app->request->isPost)
    {
        $category = Yii::$app->request->post('category');
        if($article->saveCategory($category))
        {
            return $this->redirect(['confirm','id'=>$article->id]);
    };
}
    return $this->render('setcategory',['article'=>$article,
    'selectedCategory'=>$selectedCategory,
'categories'=>$categories]);
}
public function actionSetTags($id)
{
    $article=$this->findModel($id);
    $selectedTags = $article->getSelectedTags();
   
    $tags=ArrayHelper::map(Tag::find()->all(), 'id', 'title');
    if (Yii::$app->request->isPost)
    {
        $tags=Yii::$app->request->post('tags');
        $article->saveTags($tags);
        return $this->redirect(['confirm', 'id'=>$article->id]);
    }
    return $this->render('settags',[
        'selectedTags'=>$selectedTags,
        'tags'=>$tags
    ]);
}
}
