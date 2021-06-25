<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $password
 * @property int|null $isAdmin
 * @property string|null $photo
 *
 * @property Comment[] $comments
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface

{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    const ROLE_USER = 1;
    const ROLE_ADMIN = 5;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isAdmin'], 'integer'],
            [['name', 'email', 'password', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'isAdmin' => 'Is Admin',
            'photo' => 'Photo',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);
    }
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
    public static function findByEmail($email)
    {
        return User::find()->where(['email'=>$email])->one();
    
    }
    public function validatePassword($password)
    {
        return ($this->password==$password)? true:false;
    }
    public function create()
    {
        return $this->save(false);
    }
    public function saveFromVk($uid,$first_name,$photo)
    {
            $user=User::findOne($uid);
            if ($user)
            {
                return Yii::$app->user->login($user);
            }
            $this->id=$uid;
            $this->name=$first_name;
            $this->photo=$photo;
            $this->create();
            return Yii::$app->user->login($this);
    }
    public function getImage()
    {
        
        return $this->photo;
    }
    public static function roles()
{
    return [
        self::ROLE_USER => Yii::t('app', 'User'),
        self::ROLE_ADMIN => Yii::t('app', 'Admin'),
    ];
}

/**
 * Название роли
 * @param int $id
 * @return mixed|null
 */
public function getRoleName(int $id)
{
    $list = self::roles();
    return $list[$id] ?? null;
}

public function isAdmin()
{
    return ($this->role == self::ROLE_ADMIN);
}

public function isUser()
{
    return ($this->role == self::ROLE_USER);
}
}
