<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $content
 * @property string|null $date
 * @property string|null $image
 * @property int|null $viewed
 * @property int|null $user_id
 * @property int|null $category_id
 *
 * @property ArticleTag[] $articleTags
 * @property Comment[] $comments
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'description', 'content'], 'string'],
            [['date'], 'date', 'format'=>'php:Y-m-d'],
            [['date'], 'default', 'value' =>date('Y-m-d')],
            [['title'],'string','max' =>255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'date' => 'Date',
            'image' => 'Image',
            'viewed' => 'Viewed',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
        ];
    }
public function saveImage($filename){
    $this->image =$filename;
    return $this->save(false);
}
public function getImage()
{
    
    return ($this->image) ? '/uploads/'. $this->image :'/no-image.png';}
public function delImg()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->delCurrentImg($this->image);
    }
public function beforeDelete()
{
    $this-> delImg();
    return parent::beforeDelete();
}
public function getCategory()
{
    return $this->hasOne(Category::className(), ['id' => 'category_id']);
}
public function getFoo(){
    return 'haha';
}
public function saveCategory($category_id)
{
    $category = Category::findOne($category_id);
    $this->link('category', $category);
    return true; 

}
}
