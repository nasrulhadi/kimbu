<?php

/**
 * This is the model class for table "chat_pesan".
 *
 * The followings are the available columns in table 'chat_pesan':
 * @property integer $ID_CHAT_PESAN
 * @property integer $ID_CHAT
 * @property string $PESAN
 * @property string $TANGGAL_DIBUAT
 * @property integer $STATUS
 */
class ChatPesan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ChatPesan the static model class
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
		return 'chat_pesan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_CHAT, STATUS', 'numerical', 'integerOnly'=>true),
			array('PESAN, TANGGAL_DIBUAT', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_CHAT_PESAN, ID_CHAT, PESAN, TANGGAL_DIBUAT, STATUS', 'safe', 'on'=>'search'),
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
			'iDUSER' => array(self::BELONGS_TO, 'User', 'ID_USER'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_CHAT_PESAN' => 'Id Chat Pesan',
			'ID_CHAT' => 'Id Chat',
			'PESAN' => 'Pesan',
			'TANGGAL_DIBUAT' => 'Tanggal Dibuat',
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

		$criteria->compare('ID_CHAT_PESAN',$this->ID_CHAT_PESAN);
		$criteria->compare('ID_CHAT',$this->ID_CHAT);
		$criteria->compare('PESAN',$this->PESAN,true);
		$criteria->compare('TANGGAL_DIBUAT',$this->TANGGAL_DIBUAT,true);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}