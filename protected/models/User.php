<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $ID_USER
 * @property integer $ID_DIVISI
 * @property string $USERNAME
 * @property string $PASSWORD
 * @property string $NAMA
 * @property string $EMAIL
 * @property string $TLP
 * @property string $HP
 * @property string $FOTO
 * @property integer $TYPE
 * @property string $TANGGAL_DIBUAT
 * @property integer $TERAKHIR_LOGIN
 * @property integer $STATUS
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
    public $username;
    public $password;
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_DIVISI, TYPE, TERAKHIR_LOGIN, STATUS', 'numerical', 'integerOnly'=>true),
			array('USERNAME, PASSWORD, NAMA, EMAIL, TLP, HP, FOTO', 'length', 'max'=>45),
            array('USERNAME, PASSWORD', 'required'),
			array('TANGGAL_DIBUAT', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_USER, ID_DIVISI, USERNAME, PASSWORD, NAMA, EMAIL, TLP, HP, FOTO, TYPE, TANGGAL_DIBUAT, TERAKHIR_LOGIN, STATUS', 'safe', 'on'=>'search'),
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
			'ID_USER' => 'Id User',
			'ID_DIVISI' => 'Id Divisi',
			'USERNAME' => 'Username',
			'PASSWORD' => 'Password',
			'NAMA' => 'Nama',
			'EMAIL' => 'Email',
			'TLP' => 'Tlp',
			'HP' => 'Hp',
			'FOTO' => 'Foto',
			'TYPE' => 'Type',
			'TANGGAL_DIBUAT' => 'Tanggal Dibuat',
			'TERAKHIR_LOGIN' => 'Terakhir Login',
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

		$criteria->compare('ID_USER',$this->ID_USER);
		$criteria->compare('ID_DIVISI',$this->ID_DIVISI);
		$criteria->compare('USERNAME',$this->USERNAME,true);
		$criteria->compare('PASSWORD',$this->PASSWORD,true);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('TLP',$this->TLP,true);
		$criteria->compare('HP',$this->HP,true);
		$criteria->compare('FOTO',$this->FOTO,true);
		$criteria->compare('TYPE',$this->TYPE);
		$criteria->compare('TANGGAL_DIBUAT',$this->TANGGAL_DIBUAT,true);
		$criteria->compare('TERAKHIR_LOGIN',$this->TERAKHIR_LOGIN);
		$criteria->compare('STATUS',$this->STATUS);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}