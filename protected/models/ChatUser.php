<?php

/**
 * This is the model class for table "chat_user".
 *
 * The followings are the available columns in table 'chat_user':
 * @property integer $ID_CHAT_USER
 * @property integer $ID_CHAT
 * @property integer $ID_USER
 * @property integer $STATUS
 */
class ChatUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ChatUser the static model class
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
		return 'chat_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_CHAT, ID_USER, STATUS', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_CHAT_USER, ID_CHAT, ID_USER, STATUS', 'safe', 'on'=>'search'),
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
			'ID_CHAT_USER' => 'Id Chat User',
			'ID_CHAT' => 'Id Chat',
			'ID_USER' => 'Id User',
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

		$criteria->compare('ID_CHAT_USER',$this->ID_CHAT_USER);
		$criteria->compare('ID_CHAT',$this->ID_CHAT);
		$criteria->compare('ID_USER',$this->ID_USER);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}