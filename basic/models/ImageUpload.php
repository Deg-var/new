<?php
namespace app\models;

use Symfony\Contracts\Service\Attribute\Required;
use Yii;
use yii\web\UploadedFile;
use yii\base\Model;
class ImageUpload extends Model{
    public $image;
    public function rules()
    {
        return [
            [['image'],'required'],
        [['image'],'file','extensions'=>'jpg,png']
    ];
    }
    public function uploadFile($file,$currentImage){
        $this->image =$file;
        if ($this->validate())
        {
            $this->delCurrentImg($currentImage);
            return $this->saveImg();
    }}
    public function getFolder()
    {
        return Yii::getAlias('@web').'uploads/';
    }
    public function genFileName()
    {
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }
    public function fileExist($currentImage)
    {
        if (!empty($currentImage)&& $currentImage != null)
        {return file_exists($this->getFolder(). $currentImage);}
    }
    public function delCurrentImg($currentImage)
    {
        if ($this->fileExist($currentImage))
        {
            unlink($this->getFolder().$currentImage);
        };
    }
    public function saveImg()
    {
        $filename =$this->genFileName();
        $this->image->saveAs($this->getFolder() .$filename);
        return $filename;}
}