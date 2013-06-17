<?php

/**
 * This is the model class for table "survei_grup".
 *
 * The followings are the available columns in table 'survei_grup':
 * @property integer $ID_SURVEI_GRUP
 * @property string $NAMA
 * @property string $KETERANGAN
 * @property integer $URUTAN
 * @property integer $POSITION
 *
 * The followings are the available model relations:
 * @property SurveiForm[] $surveiForms
 */
class SurveiGrup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SurveiGrup the static model class
	 */
	 
	 const TOP = 1;
	 const TAB = 2;
	 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'survei_grup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('URUTAN, POSITION', 'numerical', 'integerOnly'=>true),
			array('NAMA', 'length', 'max'=>100),
			array('KETERANGAN', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_SURVEI_GRUP, NAMA, KETERANGAN, URUTAN, POSITION', 'safe', 'on'=>'search'),
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
			'surveiForms' => array(self::HAS_MANY, 'SurveiForm', 'ID_SURVEI_GRUP'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_SURVEI_GRUP' => 'Id Survei Grup',
			'NAMA' => 'Nama',
			'KETERANGAN' => 'Keterangan',
			'URUTAN' => 'Urutan',
			'POSITION' => 'Position',
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

		$criteria->compare('ID_SURVEI_GRUP',$this->ID_SURVEI_GRUP);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('KETERANGAN',$this->KETERANGAN,true);
		$criteria->compare('URUTAN',$this->URUTAN);
		$criteria->compare('POSITION',$this->POSITION);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}