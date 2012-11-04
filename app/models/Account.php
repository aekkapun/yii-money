<?php

/**
 * This is the model class for table "Account".
 *
 * The followings are the available columns in table 'Account':
 * @property integer $Id
 * @property string $AccName
 * @property integer $AccTypeId
 * @property integer $OverDraftLimit
 *
 * The followings are the available model relations:
 * @property AccType $accType
 */
class Account extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Account the static model class
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
		return 'Account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AccTypeId, OverDraftLimit', 'required'),
			array('AccTypeId, OverDraftLimit', 'numerical', 'integerOnly'=>true),
			array('AccName', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, AccName, AccTypeId, OverDraftLimit', 'safe', 'on'=>'search'),
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
			'relAccType' => array(self::BELONGS_TO, 'AccType', 'AccTypeId'),
			'relTransaction' => array(self::HAS_MANY, 'Transaction', 'AccName'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'AccName' => 'Account Name',
			'AccTypeId' => 'Account Type',
			'OverDraftLimit' => 'Limit',
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
		$criteria->compare('AccName',$this->AccName,true);
		$criteria->compare('AccTypeId',$this->AccTypeId);
		$criteria->compare('OverDraftLimit',$this->OverDraftLimit);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * get an array of Account models
	 * @return array of Account models
	 */
	public function getAccountMenuItems($heading = true, $headingText = 'Accounts') 
	{
		$menuItems = array();
//		$menuItems[] = array('label'=>'Accounts');
		foreach ($this->findAll() as $account)
			$menuItems[] = array('label' => $account->AccName,'url' => array('account/view', 'id' => $account->Id));
		return $menuItems;
	}
	
	public function getAccounts($accType)
	{
		$criteria=new CDbCriteria;
		$criteria->condition = 'AccTypeId='.$accType;
		$criteria->order = 'AccName DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}