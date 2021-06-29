<?php

namespace app\models;
use yii\data\Pagination;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tag".
 *
 * @property int $id
 * @property string|null $title
 *
 * @property ArticleTag[] $articleTags
 */
// class Tag extends \yii\db\ActiveRecord
// {
//     /**
//      * {@inheritdoc}
//      */
//     public static function tableName()
//     {
//         return 'tag';
//     }

//     /**
//      * {@inheritdoc}
//      */
//     public function rules()
//     {
//         return [
//             [['title'], 'string', 'max' => 255],
//         ];
//     }

//     /**
//      * {@inheritdoc}
//      */
//     public function attributeLabels()
//     {
//         return [
//             'id' => 'ID',
//             'title' => 'Title',
//         ];
//     }
//     public function getArticles()
//     {
//         return $this->hasMany(Article::className(), ['category_id' => 'id']);
//     }
//     public function getArticlesCount()
//     {
//         return $this->getArticles()->count();
//     }
//     public static function getAll()
//     {
//         return Tag::find()->all();
//     }
//     public function getArticlesByTags()
//     {
//     return $this->hasMany(Tag::className(), ['id' => 'article_id'])
//         ->viaTable('article_tag', ['tag_id' => 'id']);
//     }
//     public function getArticlesByTag ()
//     {
//      $articleByTags=$this->getArticlesByTags()->select('id')->asArray()->all();
//      return ArrayHelper::getColumn($articleByTags, 'id');
//     } 
// }
