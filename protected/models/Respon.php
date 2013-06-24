<?php

/**
 * This is the model class for table "respon".
 *
 * The followings are the available columns in table 'respon':
 * @property integer $ID_RESPON
 * @property string $NAMA
 * @property string $TANGGAL_PENGISIAN
 * @property integer $ID_SURVEI
 * @property integer $APPROVAL
 *
 * The followings are the available model relations:
 * @property Survei $iDRESPON
 * @property ResponDetail[] $responDetails
 */
class Respon extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Respon the static model class
	 */
    //STATUS TOKO
    const DISETUJUI=1;
    const BELUM_DISETUJUI=0;
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'respon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_SURVEI, ID_USER', 'required'),
			array('ID_SURVEI, ID_USER, APPROVAL', 'numerical', 'integerOnly'=>true),
			array('NAMA', 'length', 'max'=>255),
			array('TANGGAL_PENGISIAN', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_RESPON, NAMA, TANGGAL_PENGISIAN, ID_SURVEI, APPROVAL', 'safe', 'on'=>'search'),
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
			'iDRESPON' => array(self::BELONGS_TO, 'Survei', 'ID_SURVEI'),
			'iDUSER' => array(self::BELONGS_TO, 'User', 'ID_USER'),
			'responDetails' => array(self::HAS_MANY, 'ResponDetail', 'ID_RESPON'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_RESPON' => 'Id Respon',
			'NAMA' => 'Nama',
			'TANGGAL_PENGISIAN' => 'Tanggal Pengisian',
			'ID_SURVEI' => 'Id Survei',
			'ID_USER' => 'Id Surveyor',
			'APPROVAL' => 'Status',
                        'SURVEYOR' => 'Surveyor',
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

		$criteria->compare('ID_RESPON',$this->ID_RESPON);
		$criteria->compare('NAMA',$this->NAMA,false);
		$criteria->compare('TANGGAL_PENGISIAN',$this->TANGGAL_PENGISIAN,true);
		$criteria->compare('ID_SURVEI',$this->ID_SURVEI);
		$criteria->compare('ID_USER',$this->ID_USER);
		$criteria->addSearchCondition('APPROVAL',$this->APPROVAL,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}