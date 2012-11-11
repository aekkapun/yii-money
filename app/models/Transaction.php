<?php

/**
 * This is the model class for table "Transaction".
 *
 * The followings are the available columns in table 'Transaction':
 * @property integer $Id
 * @property integer $AccountId
 * @property string $TransDate
 * @property string $TransType
 * @property integer $PayeeId
 * @property string $TransAmount
 * @property integer $TransId
 * @property integer $SubCatId
 *
 * The followings are the available model relations:
 * @property Payee $payee
 */
class Transaction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Transaction the static model class
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
		return 'Transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AccountId, TransDate, TransType, SubCatId, PayeeId, TransAmount', 'required'),
			array('AccountId PayeeId, TransId, SubCatId', 'numerical', 'integerOnly'=>true),
			array('TransType, TransAmount', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, AccountId, TransDate, TransType, PayeeId, TransAmount, TransId, SubCatId', 'safe', 'on'=>'search'),
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
			'relAccount' => array(self::BELONGS_TO, 'Account', 'AccountId'),
			'relPayee' => array(self::BELONGS_TO, 'Payee', 'PayeeId'),
			'relSubCat' => array(self::BELONGS_TO, 'SubCat', 'SubCatId'),
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
			'TransAmount' => 'Amount',
			'TransId' => 'Trans Id',
			'SubCatId' => 'Category',
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

//		$criteria->compare('Id',$this->Id);
		$criteria->compare('AccountId',$this->AccountId,true);
		$criteria->compare('TransDate',$this->TransDate,true);
		$criteria->compare('TransType',$this->TransType,true);
		$criteria->compare('PayeeId',$this->PayeeId);
		$criteria->compare('TransAmount',$this->TransAmount,true);
		$criteria->compare('TransId',$this->TransId);
		$criteria->compare('SubCatId',$this->SubCatId);
		$criteria->order = 'TransDate DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Date format function
	 * @return int transaction date 
	 */
	public function getTransDateInt(){
		return strtotime($this->TransDate);
	}
	
	public function displayTransDate($format="M j, Y"){
		return date($format, $this->transDateInt);
	}
	
	
	
	
	public function getAccountTransactions($accountId)
	{
		$criteria=new CDbCriteria;
		$criteria->condition = 'AccountId='.$accountId;
		$criteria->order = 'TransDate DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));		
	}
	
	public function getPayeeTransactions($payeeId)
	{
		$criteria=new CDbCriteria;
		$criteria->condition = 'PayeeId='.$payeeId;
		$criteria->order = 'TransDate DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));		
	}
	
	
	/**
	 * @desc Function to return an JSON array of transactions by account Id transactions
	 * @param int $acccountId, account Id
	 * @return array JSON 
	 */	
	public function getAccountCashflowJson($accountId)
	{
		
		$criteria=new CDbCriteria;
		$criteria->condition = 'AccountId='.$accountId;
		$criteria->order = 'TransDate DESC';
		$transactions = $this->findAll($criteria);
		
		return CJSON::encode($transactions);
	  
	}

	
	
	
	public function getAccountTypeTransactions($id)
	{
		$criteria=new CDbCriteria;
		$criteria->condition = 'relAccount.AccTypeId='.$id;
		$criteria->order = 'TransDate DESC';
		
		$criteria->with = 'relAccount';
		$criteria->together = false;
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));		
	}
	
}