<?php

/**
 * This is the model class for table "grafik".
 *
 * The followings are the available columns in table 'grafik':
 * @property integer $ID_GRAFIK
 * @property integer $ID_SURVEI
 * @property integer $ID_PERTANYAAN
 *
 * The followings are the available model relations:
 * @property Survei $iDSURVEI
 * @property SurveiPertanyaan $iDPERTANYAAN
 * @property GrafikParameter[] $grafikParameters
 */
class Grafik extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Grafik the static model class
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
		return 'grafik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_SURVEI, ID_PERTANYAAN', 'required'),
			array('ID_SURVEI, ID_PERTANYAAN', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_GRAFIK, ID_SURVEI, ID_PERTANYAAN', 'safe', 'on'=>'search'),
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
			'iDPERTANYAAN' => array(self::BELONGS_TO, 'SurveiPertanyaan', 'ID_PERTANYAAN'),
			'grafikParameters' => array(self::HAS_MANY, 'GrafikParameter', 'ID_GRAFIK'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_GRAFIK' => 'Id Grafik',
			'ID_SURVEI' => 'Id Survei',
			'ID_PERTANYAAN' => 'Id Pertanyaan',
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

		$criteria->compare('ID_GRAFIK',$this->ID_GRAFIK);
		$criteria->compare('ID_SURVEI',$this->ID_SURVEI);
		$criteria->compare('ID_PERTANYAAN',$this->ID_PERTANYAAN);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}