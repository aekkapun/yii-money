<?php

/**
 * This is the model class for table "Accounts".
 *
 * The followings are the available columns in table 'Accounts':
 * @property integer $Id
 * @property string $AccName
 * @property integer $AccTypeId
 * @property integer $OverDraftLimit
 *
 * The followings are the available model relations:
 * @property AccType $accType
 */
class Accounts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Accounts the static model class
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
		return 'Accounts';
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
			'accType' => array(self::BELONGS_TO, 'AccType', 'AccTypeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'AccName' => 'Acc Name',
			'AccTypeId' => 'Acc Type',
			'OverDraftLimit' => 'Over Draft Limit',
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
}