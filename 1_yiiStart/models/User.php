<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property string $gender
 * @property integer $age
 * @property string $languages
 */
class User extends \yii\db\ActiveRecord
{
    public $password_confirm;
    public $languagesArr;
    public $_languages;
     
    public function getLanguagesArr()
    {
        //die("wertghwergwr");
        //return ;

        //while(1);
        //Yii::error('getLanguages **************************************',"file");
        return implode(',', $this->languages);
    }
/*
    public function setLanguagesArr(array $value)
    {

        echo "werhqewrqewrhwerhwtehtrhtrhtrhtrhtrhr";
        //Yii::error('setLanguages **************************************',"file");
        $this->languages = implode(',', $value);
    }*/
/*
    public function afterFind(){
        parent::afterFind();
        //echo "afterFind";
        //die();
        $this->languages = explode(',', $this->languages);
        echo  "<br><br><br>".__METHOD__;
        var_dump($this);
        //die("!!" . "" . "!!");
    }
    
    public function beforeSave($insert)
    {
        //echo "beforeSave";
        //die();

        //Yii::error('beforeSave **************************************');
        //var_dump($this);
         //$this->payment_methods = serialize($this->payment_methods);
        //$this->languages = implode(',', $this->languages);
        //$this->languages = serialize($this->languages);
       // $this->languages = implode(',', $this->languagesArr);
        if(parent::beforeSave($insert))
        {
             //var_dump($this->languages);
             //$this->languages = implode(',', $this->languages);
             $this->languages = implode(',', $this->languagesArr);
            return true;
        }
        else
            return false;
    }

  /*  public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);
        $this->languages = explode(',', $this->languages);

    }*/

    public function __set($name, $value) {
        if ($name === 'languages') {
    //        echo "<br><br><br><br>"."languages";
            if(is_array($value))
                $this->setAttribute('languages', implode(",",$value));
            else 
                $this->setAttribute('languages', "");
            //die("rtyjrtyjr");
        } else {
            parent::__set($name, $value);
        }
    }

    public function __get($name) {
        if ($name === 'languages') {
      //      echo "<br><br><br><br>"."languages";
            $lan = explode(",", $this->getAttribute('languages'));
      //      var_dump($lan);
       //     var_dump($this->getAttribute('languages'));
            return  $lan;
        }
        return parent::__get($name);
    }
/**/

    /**
     * @inheritdoc
    */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        //Yii::error('rules **************************************',"file");
        return [
            [['login', 'password','password_confirm', 'email', 'phone', 'age','gender'], 'required'],
            [['gender'], 'string'],
            [['languages'], 'safe'],
            [['age'], 'integer'],
            [['login', 'password'], 'string', 'max' => 40],
            [['email'], 'email'],
            [['phone'], 'string', 'max' => 30],
           // [['languages'], 'checkboxlistoptions', 'category' => 'category.table'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'email' => 'Email',
            'phone' => 'Phone',
            'gender' => 'Gender',
            'age' => 'Age',
            'languages' => 'Languages',
        ];
    }
}
