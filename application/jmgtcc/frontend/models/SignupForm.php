<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $first_name;
    public $last_name;
    public $gender;
    public $city;
    public $contact_number;
    public $email;
    public $password;
    public $confirmpassword;
	public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
        	['first_name', 'required'],
        	['last_name', 'required'],
        	['gender', 'required'],
        	['city', 'required'],
        	['contact_number', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        	['contact_number', 'integer'],
        	['confirmpassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match. Try again."],
			
			['verifyCode', 'captcha'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
	 
	  public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }
	 
	 
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->gender = $this->gender;
            $user->city = $this->city;
            $user->contact_number = $this->contact_number;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}

