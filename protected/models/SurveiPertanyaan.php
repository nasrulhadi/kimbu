<?php

/**
 * This is the model class for table "survei_pertanyaan".
 *
 * The followings are the available columns in table 'survei_pertanyaan':
 * @property integer $ID_SURVEI_PERTANYAAN
 * @property integer $ID_SURVEI_FORM
 * @property string $PERTANYAAN
 * @property string $HINT
 * @property integer $URUTAN
 * @property integer $TYPE
 *
 * The followings are the available model relations:
 * @property ResponDetail[] $responDetails
 * @property SurveiForm $iDSURVEIFORM
 * @property SurveiPilihanJawaban[] $surveiPilihanJawabans
 */
class SurveiPertanyaan extends CActiveRecord
{

	const TEXTFIELD = 1;
	const TEXTAREA = 2;
	const RADIO = 3;
	const CHECKBOX = 4;
	const DROPDOWN = 5;
	const UPLOAD = 6;
	const RADIO_FIELD = 7;
	const CHECKBOX_FIELD = 8;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SurveiPertanyaan the static model class
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
		return 'survei_pertanyaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_SURVEI_FORM, URUTAN, TYPE', 'numerical', 'integerOnly'=>true),
			array('PERTANYAAN, HINT', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_SURVEI_PERTANYAAN, ID_SURVEI_FORM, PERTANYAAN, HINT, URUTAN, TYPE', 'safe', 'on'=>'search'),
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
			'responDetails' => array(self::HAS_MANY, 'ResponDetail', 'ID_PERTANYAAN'),
			'iDSURVEIFORM' => array(self::BELONGS_TO, 'SurveiForm', 'ID_SURVEI_FORM'),
			'surveiPilihanJawabans' => array(self::HAS_MANY, 'SurveiPilihanJawaban', 'ID_SURVEI_PERTANYAAN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_SURVEI_PERTANYAAN' => 'Id Survei Pertanyaan',
			'ID_SURVEI_FORM' => 'Id Survei Form',
			'PERTANYAAN' => 'Pertanyaan',
			'HINT' => 'Hint',
			'URUTAN' => 'Urutan',
			'TYPE' => 'Type',
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

		$criteria->compare('ID_SURVEI_PERTANYAAN',$this->ID_SURVEI_PERTANYAAN);
		$criteria->compare('ID_SURVEI_FORM',$this->ID_SURVEI_FORM);
		$criteria->compare('PERTANYAAN',$this->PERTANYAAN,true);
		$criteria->compare('HINT',$this->HINT,true);
		$criteria->compare('URUTAN',$this->URUTAN);
		$criteria->compare('TYPE',$this->TYPE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}