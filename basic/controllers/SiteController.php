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
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\data\Sort;
use app\models\User;




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
                
                'only' => ['login', 'logout', 'signup','new','preview','setcategory','settags','myarticle'],
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['new','setimage','preview','setcategory','settags','myarticle'],
                        'roles' => ['?'],
                        'matchCallback'=> function($rule,$action)
                        {
                        $this->redirect(['site/404']);
                        },
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout','new','setimage','preview','setcategory','settags','myarticle'],
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
        
       $sort = new Sort([
            'attributes' => [
                'date'=>[
                    'asc' => ['date' => SORT_ASC],
                    'desc' => ['date' => SORT_DESC],
                ],
                'user_id'=>[
                    'asc' => ['user_id' => SORT_ASC],
                    'desc' => ['user_id' => SORT_DESC],
                    'default' => SORT_DESC,
                ],
            ],
        ]);
        $popular= Article::getPopular();
        $recent =Article::getRecent();
        $categories=Category::getAll();
        $query =Article::find()->where(['status'=>2])->orderBy($sort->orders);
        $count = $query->count();
        $pagination = new Pagination(['totalCount'=>$count]);
        $articles=$query->offset($pagination->offset)->limit($pagination->limit)->all();
        $users=User::getAll();
        $popularcategories = Category::getPopularCategory();
        
        // $tags=Tag::getAll();
        
    return $this->render('index', [
         'articles' => $articles,
         'pagination' => $pagination,
         'popular'=>$popular,
         'recent'=>$recent,
         'categories'=>$categories,
         'sort'=>$sort,
         'users'=>$users,
        'popularcategories'=>$popularcategories,
         
        //  'tags'=>$tags,
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
        // $tags=Tag::getAll();
        $users=User::getAll();
        $popularcategories = Category::getPopularCategory();
                
        return $this->render('categories',[
            
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'commentForm'=>$commentForm,
            'users'=>$users,
        'popularcategories'=>$popularcategories,
            // 'tags'=>$tags,
        ]);
    }
    public function actionUsers()
    {
        $users=User::getAll();
        $popular= Article::getPopular();
        $recent =Article::getRecent();
        $categories=Category::getAll();
        $commentForm = new CommentForm();
        // $tags=Tag::getAll();
        $users=User::getAll();
        $popularcategories = Category::getPopularCategory();
                
        return $this->render('users',[
            'users'=>$users,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'commentForm'=>$commentForm,
            // 'tags'=>$tags,
            
        'popularcategories'=>$popularcategories,
        ]);
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
        // $tags=Tag::getAll();
        $users=User::getAll();
        $popularcategories = Category::getPopularCategory();
                
        return $this->render('single',[
            'article'=>$article,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'comments'=>$comments,
            'commentForm'=>$commentForm,
            'users'=>$users,
        'popularcategories'=>$popularcategories,
            // 'tags'=>$tags,
        ]);
    }
    // public function actionTags()
    // {
    //     $popular= Article::getPopular();
    //     $recent =Article::getRecent();
    //     $categories=Category::getAll();
    //     $commentForm = new CommentForm();
    //     $tags=Tag::getAll();
                
    //     return $this->render('tags',[
    //         'popular'=>$popular,
    //         'recent'=>$recent,
    //         'categories'=>$categories,
    //         'commentForm'=>$commentForm,
    //         'tags'=>$tags,]);
    // }
    public function actionCategory($id)
    {
        $category= Category::findOne($id);
        $data = Category::getArticlesByCategory($id);
        $popular= Article::getPopular();
        $recent =Article::getRecent();
        $categories=Category::getAll();
        // $tags=Tag::getAll();
        $users=User::getAll();
        $popularcategories = Category::getPopularCategory();
    


        return $this->render('category', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'category'=>$category,
            'users'=>$users,
            'popularcategories'=>$popularcategories,
            // 'tags'=>$tags,
       ]);
    }
    // public function actionTag($id)
    // {
    //     $tag= Tag::findOne($id);
    //     $data = Category::getArticlesByCategory($id);
    //     $popular= Article::getPopular();
    //     $recent =Article::getRecent();
    //     $categories=Category::getAll();
    //     $tags=Tag::getAll();
    //     $article= Article::find();
    //     $articleByTags = $article->getArticlesByTag();
        
        


    //     return $this->render('tag', [
    //         'articles' => $data['articles'],
    //         'pagination' => $data['pagination'],
    //         'popular'=>$popular,
    //         'recent'=>$recent,
    //         'categories'=>$categories,
    //         'tags'=>$tags,
    //         'tag'=>$tag,
            
    //    ]);
    // }
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
            return $this->redirect(['preview', 'id' => $model->id]);
        }else{

        return $this->render('new', [
            'model' => $model,
        ]);} 
    }
    public function actionPreview($id)
    {
        $article= Article::findOne($id);
        $popular= Article::getPopular();
        $recent =Article::getRecent();
        $categories=Category::getAll();
        $comments=$article->getArticleComments();
        $commentForm = new CommentForm();
        $article->viewedCounter();
        // $tags=Tag::getAll();
        // $tag= Tag::findOne($id);
        // $selectedTags = $article->getSelectedTags();
        $users=User::getAll();
        $popularcategories = Category::getPopularCategory();
                
        return $this->render('preview',[
            'article'=>$article,
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'comments'=>$comments,
            'commentForm'=>$commentForm,
            // 'tags'=>$tags,
            'model' => $this->findModel($id),
            // 'tag'=>$tag,
            // 'selectedTags'=>$selectedTags,
            'users'=>$users,
        'popularcategories'=>$popularcategories,
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
           return $this->redirect(['preview','id'=>$article->id]);
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
            return $this->redirect(['preview','id'=>$article->id]);
    };
}
    return $this->render('setcategory',['article'=>$article,
    'selectedCategory'=>$selectedCategory,
'categories'=>$categories]);
}
// public function actionSetTags($id)
// {
//     $article=$this->findModel($id);
//     $selectedTags = $article->getSelectedTags();
   
//     $tags=ArrayHelper::map(Tag::find()->all(), 'id', 'title');
//     if (Yii::$app->request->isPost)
//     {
//         $tags=Yii::$app->request->post('tags');
//         $article->saveTags($tags);
//         return $this->redirect(['preview', 'id'=>$article->id]);
//     }
//     return $this->render('settags',[
//         'selectedTags'=>$selectedTags,
//         'tags'=>$tags
//     ]);
// }
public function actionAllow($id)
{
    $article = Article::findOne($id);
    if($article->allow())
    {
        return $this->redirect(['preview', 'id' =>$id]);
    }
}
public function actionDisallow($id)
{
    $article = Article::findOne($id);
    if($article->disallow())
    {
        return $this->redirect(['preview', 'id' =>$id]);
    }
}                     
public function actionDelete($id)
    {
        $article=Article::findOne($id);
        if($article->delete())
        {
            return $this->redirect(['index']);
        }
    }
    public function actionMyarticle()
    {
        $sort = new Sort([
            'attributes' => [
                'date'=>[
                    'asc' => ['date' => SORT_ASC],
                    'desc' => ['date' => SORT_DESC],
                ],
                'user_id'=>[
                    'asc' => ['user_id' => SORT_ASC],
                    'desc' => ['user_id' => SORT_DESC],
                    'default' => SORT_DESC,
                ],
            ],
        ]);
        $popular= Article::getPopular();
        $recent =Article::getRecent();
        $categories=Category::getAll();
        // $tags=Tag::getAll();
        $users=User::getAll();
        $popularcategories = Category::getPopularCategory();
        $query =Article::find()->where(['status'=>2])->orderBy($sort->orders);
        $count = $query->count();
        $pagination = new Pagination(['totalCount'=>$count]);
        $articles=$query->offset($pagination->offset)->limit($pagination->limit)->all();
    
        
    

    return $this->render('myarticle', [
         'articles' => $articles,
         'pagination' => $pagination,
         'popular'=>$popular,
         'recent'=>$recent,
         'categories'=>$categories,
        //  'tags'=>$tags,
        'users'=>$users,
        'popularcategories'=>$popularcategories,
    ]);
    }
    public function actionUser($id)
    {
        
        $data = User::getArticlesByUser($id);
        $popular= Article::getPopular();
        $recent =Article::getRecent();
        $categories=Category::getAll();
        // $tags=Tag::getAll();
        $users=User::getAll();
        $popularcategories = Category::getPopularCategory();
        $user= User::findOne($id);
    


        return $this->render('user', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
            'popular'=>$popular,
            'recent'=>$recent,
            'categories'=>$categories,
            'users'=>$users,
            'popularcategories'=>$popularcategories,
            'user'=>$user,
            // 'tags'=>$tags,
       ]);
    }
}
