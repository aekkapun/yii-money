<?php

/**
 * This is the model class for table "Cat".
 *
 * The followings are the available columns in table 'Cat':
 * @property integer $Id
 * @property string $CategoryName
 * @property string $CatType
 *
 * The followings are the available model relations:
 * @property SubCat[] $subCat
 */
class Cat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cat the static model class
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
		return 'Cat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CategoryName', 'length', 'max'=>50),
			array('CatType', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, CategoryName, CatType', 'safe', 'on'=>'search'),
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
			'relSubCat' => array(self::HAS_MANY, 'SubCat', 'CatId'),
			'relTransaction' => array(self::HAS_MANY, 'Transaction', 'SubCatName'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'CategoryName' => 'Category Name',
			'CatType' => 'Category Type',
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
		$criteria->compare('CategoryName',$this->CategoryName,true);
		$criteria->compare('CatType',$this->CatType,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}