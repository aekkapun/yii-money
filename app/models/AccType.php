<?php

/**
 * This is the model class for table "AccType".
 *
 * The followings are the available columns in table 'AccType':
 * @property integer $Id
 * @property string $AccTypeName
 *
 * The followings are the available model relations:
 * @property Accounts[] $accounts
 */
class AccType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AccType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'AccType';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AccTypeName', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, AccTypeName', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'relAccount' => array(self::HAS_MANY, 'Account', 'AccTypeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'AccTypeName' => 'Account Type Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('AccTypeName',$this->AccTypeName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * get an array of Account Type models
	 * @return array of Account Type models
	 */
	public function getAccountTypeMenuItems($homeLink = true) 
	{
		$menuItems = array();
		if($homeLink){
			$menuItems = array(
				array('label' => 'Accounts home', 'icon' => 'home', 'url' => array('/account')),
				'---',
				);
		}
		
		foreach($this->findAll() as $accountType)
			$menuItems[] = array('label' => $accountType->AccTypeName.'s', 'url' => array('acctype/view', 'id' => $accountType->Id));
		return $menuItems;
	}
	
}