<?php

/**
 * This is the model class for table "account_data".
 *
 * The followings are the available columns in table 'account_data':
 * @property integer $account_data_id
 * @property integer $account_id
 * @property string $name
 * @property string $surname
 * @property integer $age
 * @property integer $married
 */
class AccountData extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AccountData the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'account_data';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, surname, age, married', 'required'),
            array('account_id, age, married', 'numerical', 'integerOnly' => true),
            array('name, surname', 'length', 'max' => 40),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('account_data_id, account_id, name, surname, age, married', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'account_data_id' => 'Id danych',
            'account_id' => 'Id konta',
            'name' => 'Imię',
            'surname' => 'Nazwisko',
            'age' => 'Wiek',
            'married' => 'Żonaty/ta',
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

        $criteria->compare('account_data_id', $this->account_data_id);
        $criteria->compare('account_id', $this->account_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('surname', $this->surname, true);
        $criteria->compare('age', $this->age);
        $criteria->compare('married', $this->married);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}