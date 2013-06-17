<?php

/**
 * This is the model class for table "survei_form".
 *
 * The followings are the available columns in table 'survei_form':
 * @property integer $ID_SURVEI_FORM
 * @property integer $ID_SURVEI
 * @property string $NAMA
 * @property string $KETERANGAN
 * @property integer $STATUS
 * @property integer $ID_SURVEI_GRUP
 *
 * The followings are the available model relations:
 * @property Survei $iDSURVEI
 * @property SurveiGrup $iDSURVEIGRUP
 * @property SurveiPertanyaan[] $surveiPertanyaans
 */
class SurveiForm extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SurveiForm the static model class
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
		return 'survei_form';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_SURVEI, ID_SURVEI_GRUP', 'required'),
			array('ID_SURVEI, STATUS, ID_SURVEI_GRUP', 'numerical', 'integerOnly'=>true),
			array('NAMA', 'length', 'max'=>200),
			array('KETERANGAN', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_SURVEI_FORM, ID_SURVEI, NAMA, KETERANGAN, STATUS, ID_SURVEI_GRUP', 'safe', 'on'=>'search'),
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
			'iDSURVEI' => array(self::BELONGS_TO, 'Survei', 'ID_SURVEI'),
			'iDSURVEIGRUP' => array(self::BELONGS_TO, 'SurveiGrup', 'ID_SURVEI_GRUP'),
			'surveiPertanyaans' => array(self::HAS_MANY, 'SurveiPertanyaan', 'ID_SURVEI_FORM'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_SURVEI_FORM' => 'Id Survei Form',
			'ID_SURVEI' => 'Id Survei',
			'NAMA' => 'Nama',
			'KETERANGAN' => 'Keterangan',
			'STATUS' => 'Status',
			'ID_SURVEI_GRUP' => 'Id Survei Grup',
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

		$criteria->compare('ID_SURVEI_FORM',$this->ID_SURVEI_FORM);
		$criteria->compare('ID_SURVEI',$this->ID_SURVEI);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('KETERANGAN',$this->KETERANGAN,true);
		$criteria->compare('STATUS',$this->STATUS);
		$criteria->compare('ID_SURVEI_GRUP',$this->ID_SURVEI_GRUP);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}