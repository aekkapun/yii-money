<?php

/**
 * This is the model class for table "Transactions".
 *
 * The followings are the available columns in table 'Transactions':
 * @property integer $Id
 * @property integer $AccountId
 * @property string $TransDate
 * @property string $TransType
 * @property integer $PayeeId
 * @property integer $CatId
 * @property string $TransAmount
 * @property integer $TransId
 * @property integer $SubCatId
 *
 * The followings are the available model relations:
 * @property Payee $payee
 */
class Transactions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Transactions the static model class
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
		return 'Transactions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AccountId, TransDate, TransType, PayeeId, CatId, TransAmount', 'required'),
			array('AccountId PayeeId, CatId, TransId, SubCatId', 'numerical', 'integerOnly'=>true),
			array('TransType, TransAmount', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, AccountId, TransDate, TransType, PayeeId, CatId, TransAmount, TransId, SubCatId', 'safe', 'on'=>'search'),
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
			'accounts' => array(self::BELONGS_TO, 'accounts', 'AccountId'),
			'payees' => array(self::BELONGS_TO, 'payees', 'PayeeId'),
			'cats' => array(self::BELONGS_TO, 'cats', 'CatId'),
			'subCats' => array(self::BELONGS_TO, 'subCats', 'CatId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'AccountId' => 'Account',
			'TransDate' => 'Date',
			'TransType' => 'Type',
			'PayeeId' => 'Payee',
			'CatId' => 'Category',
			'TransAmount' => 'Amount',
			'TransId' => 'Trans Id',
			'SubCatId' => 'Sub Category',
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

	//	$criteria->compare('Id',$this->Id);
		$criteria->compare('AccountId',$this->AccountId,true);
		$criteria->compare('TransDate',$this->TransDate,true);
		$criteria->compare('TransType',$this->TransType,true);
		$criteria->compare('PayeeId',$this->PayeeId);
		$criteria->compare('CatId',$this->CatId);
		$criteria->compare('TransAmount',$this->TransAmount,true);
		$criteria->compare('TransId',$this->TransId);
		$criteria->compare('SubCatId',$this->SubCatId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}