<?php

/**
 * This is the model class for table "survei_pilihan_jawaban".
 *
 * The followings are the available columns in table 'survei_pilihan_jawaban':
 * @property integer $ID_SURVEI_JAWABAN
 * @property integer $ID_SURVEI_PERTANYAAN
 * @property string $JAWABAN
 * @property integer $URUTAN
 *
 * The followings are the available model relations:
 * @property SurveiPertanyaan $iDSURVEIPERTANYAAN
 */
class SurveiPilihanJawaban extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SurveiPilihanJawaban the static model class
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
		return 'survei_pilihan_jawaban';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_SURVEI_PERTANYAAN, URUTAN', 'numerical', 'integerOnly'=>true),
			array('JAWABAN', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_SURVEI_JAWABAN, ID_SURVEI_PERTANYAAN, JAWABAN, URUTAN', 'safe', 'on'=>'search'),
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
			'iDSURVEIPERTANYAAN' => array(self::BELONGS_TO, 'SurveiPertanyaan', 'ID_SURVEI_PERTANYAAN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_SURVEI_JAWABAN' => 'Id Survei Jawaban',
			'ID_SURVEI_PERTANYAAN' => 'Id Survei Pertanyaan',
			'JAWABAN' => 'Jawaban',
			'URUTAN' => 'Urutan',
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

		$criteria->compare('ID_SURVEI_JAWABAN',$this->ID_SURVEI_JAWABAN);
		$criteria->compare('ID_SURVEI_PERTANYAAN',$this->ID_SURVEI_PERTANYAAN);
		$criteria->compare('JAWABAN',$this->JAWABAN,true);
		$criteria->compare('URUTAN',$this->URUTAN);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}