<?php

/**
 * This is the model class for table "respon_detail".
 *
 * The followings are the available columns in table 'respon_detail':
 * @property integer $ID_RESPON_DETAIL
 * @property string $RESPON
 * @property integer $ID_PERTANYAAN
 * @property integer $ID_RESPON
 *
 * The followings are the available model relations:
 * @property Respon $iDRESPON
 * @property SurveiPertanyaan $iDPERTANYAAN
 */
class ResponDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ResponDetail the static model class
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
		return 'respon_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RESPON, ID_PERTANYAAN, ID_RESPON', 'required'),
			array('ID_PERTANYAAN, ID_RESPON', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_RESPON_DETAIL, RESPON, ID_PERTANYAAN, ID_RESPON', 'safe', 'on'=>'search'),
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
			'iDRESPON' => array(self::BELONGS_TO, 'Respon', 'ID_RESPON'),
			'iDPERTANYAAN' => array(self::BELONGS_TO, 'SurveiPertanyaan', 'ID_PERTANYAAN'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_RESPON_DETAIL' => 'Id Respon Detail',
			'RESPON' => 'Respon',
			'ID_PERTANYAAN' => 'Id Pertanyaan',
			'ID_RESPON' => 'Id Respon',
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

		$criteria->compare('ID_RESPON_DETAIL',$this->ID_RESPON_DETAIL);
		$criteria->compare('RESPON',$this->RESPON,true);
		$criteria->compare('ID_PERTANYAAN',$this->ID_PERTANYAAN);
		$criteria->compare('ID_RESPON',$this->ID_RESPON);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}