<?php

/**
 * This is the model class for table "account".
 *
 * The followings are the available columns in table 'account':
 * @property integer $account_id
 * @property integer $type
 * @property string $login
 * @property string $password
 */
class Account extends CActiveRecord {

    public $repeatPassword;
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Account the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'account';
    }
    
    /**
     * Function does make additional checks or filters before saving data
     * @return parent::beforeSave()
     */
    public function beforeSave() {
        //MD5 password field or remove from saving if not required
        if(!empty($this->password)){
            $pass = md5($this->password);
            $this->password = $pass;
        } else {
            unset($this->password);
        }
        
        return parent::beforeSave();
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type, login, password', 'required', 'on' => 'insert'),
            array('type, login', 'required', 'on' => 'update'),
            array('type', 'numerical', 'integerOnly' => true),
            array('login', 'length', 'max' => 30),
            array('password', 'length', 'max' => 100),
            array('password', 'length', 'min' => 3),
            array('repeatPassword', 'length', 'max' => 100),
            array('repeatPassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Hasła nie są identyczne"),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('account_id, type, login, password', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'account_data' => array(self::HAS_ONE, 'AccountData', 'account_id'),
            'account_type' => array(self::BELONGS_TO, 'AccountType', 'type')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'account_id' => 'Konto',
            'type' => 'Typ',
            'login' => 'Login',
            'password' => 'Hasło',
            'repeatPassword' => 'Powtórz hasło'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('account_id', $this->account_id);
        $criteria->compare('type', $this->type);
        $criteria->compare('login', $this->login, true);
        $criteria->compare('password', $this->password, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}