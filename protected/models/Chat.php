<?php

/**
 * This is the model class for table "chat".
 *
 * The followings are the available columns in table 'chat':
 * @property integer $ID_CHAT
 * @property string $NAMA
 * @property integer $DIBUAT_OLEH
 * @property string $DIBUAT_TANGGAL
 * @property string $TERAKHIR_UPDATE
 * @property integer $STATUS
 */
class Chat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Chat the static model class
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
		return 'chat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DIBUAT_OLEH, STATUS', 'numerical', 'integerOnly'=>true),
			array('NAMA', 'length', 'max'=>45),
			array('DIBUAT_TANGGAL, TERAKHIR_UPDATE', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_CHAT, NAMA, DIBUAT_OLEH, DIBUAT_TANGGAL, TERAKHIR_UPDATE, STATUS', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_CHAT' => 'Id Chat',
			'NAMA' => 'Nama',
			'DIBUAT_OLEH' => 'Dibuat Oleh',
			'DIBUAT_TANGGAL' => 'Dibuat Tanggal',
			'TERAKHIR_UPDATE' => 'Terakhir Update',
			'STATUS' => 'Status',
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

		$criteria->compare('ID_CHAT',$this->ID_CHAT);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('DIBUAT_OLEH',$this->DIBUAT_OLEH);
		$criteria->compare('DIBUAT_TANGGAL',$this->DIBUAT_TANGGAL,true);
		$criteria->compare('TERAKHIR_UPDATE',$this->TERAKHIR_UPDATE,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}