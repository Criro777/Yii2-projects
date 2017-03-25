<?php

namespace app\models;

use yii\base\Model;
use yii\web\Request;

class SignupForm extends Model
{
    public $name;
    public $email;
    public $password;
    public $image;

    
    public function rules()
    {
        return [
            [['name','email','password'], 'required'],
            [['name'], 'string'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'имя',
            'email' => 'e-mail',
            'password' => 'пароль',
            'image' => 'аватар',
        ];
    }


    /**
     * Регистрация пользователя
     * @param $avatar
     * @return mixed
     */
    public function signup($avatar)
    {
        if($this->validate())
        {
            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->password = sha1($this->password);
            $user->photo = ($avatar) ? '/uploads/' . $avatar : '/no-user.png';

            return $user->save();
        }
    }
}