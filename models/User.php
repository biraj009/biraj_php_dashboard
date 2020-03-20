<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\IdentityInterface;

class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'user';
    }
   
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'username', 'password'], 'required'],
            [['age', 'sex', 'city', 'state', 'created_at', 'deleted', 'status', 'updated_at'], 'safe', 'on' => ['update']],
            [['email'], 'email'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This username has already been taken.'],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email has already been taken.'],
            ['access_token', 'unique', 'targetClass' => 'app\models\User', 'message' => 'Invalid access_token.'],
            ['email', 'filter', 'filter' => 'trim'],
            ['username', 'filter', 'filter' => 'trim'],
            [['name', 'city', 'state'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'access_token' => 'Access Token',
            'name' => 'Name',
            'age' => 'Age',
            'sex' => 'Sex',
            'city' => 'City',
            'status' => 'Status',
            'deleted' => 'Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function findIdentityByAccessToken($token, $type = null)
    { 
       
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username, $isDelivery = 0)
    {
        
    }
    
    public static function findById($id)
    {

    }

    public function getId(){

    }

    public function validateAuthKey($authKey){

    }

    public function getAuthKey(){
        
    }

        /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        
    }
 
}
