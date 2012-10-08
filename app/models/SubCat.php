<?php

/**
 * This is the model class for table "SubCat".
 *
 * The followings are the available columns in table 'SubCat':
 * @property integer $Id
 * @property integer $CatId
 * @property string $SubCatName
 * @property string $CatType
 *
 * The followings are the available model relations:
 * @property Cats $cat
 */
class SubCat extends CActiveRecord {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SubCat the static model class
	 */
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'SubCat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CatId, CatType', 'required'),
			array('CatId', 'numerical', 'integerOnly' => true),
			array('SubCatName', 'length', 'max' => 50),
			array('CatType', 'length', 'max' => 7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, CatId, SubCatName, CatType', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'relCat' => array(self::BELONGS_TO, 'Cat', 'CatId'),
			'relTransaction' => array(self::HAS_MANY, 'Transaction', 'SubCatName'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'Id' => 'ID',
			'CatId' => 'Parent Category',
			'SubCatName' => 'Sub Category',
			'CatType' => 'Type',
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

		$criteria->compare('Id', $this->Id);
		$criteria->compare('CatId', $this->CatId);
		$criteria->compare('SubCatName', $this->SubCatName, true);
		$criteria->compare('CatType', $this->CatType, true);
		$criteria->order = 'CatId';

		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
				));
	}

	/**
	 * Retrieves a category name belonging to a sub category id passed into it.
	 * @author Dan De Luca
	 * @param int $subCatId
	 * @return string 'CategoryName: SubCatName'
	 */
	public function getCatName($subCatId) {
		$cat = $this->model()->findByPk($subCatId);
		$name = Cat::model()->findByPk($cat->CatId);
		
		return $name->CategoryName . ': ';
	}

}