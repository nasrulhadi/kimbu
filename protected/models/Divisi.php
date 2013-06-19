<?php

/**
 * This is the model class for table "divisi".
 *
 * The followings are the available columns in table 'divisi':
 * @property integer $ID_DIVISI
 * @property integer $ID_PERUSAHAAN
 * @property string $NAMA
 * @property string $KETERANGAN
 * @property string $LOGO
 */
class Divisi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Divisi the static model class
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
		return 'divisi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_PERUSAHAAN', 'numerical', 'integerOnly'=>true),
            array('NAMA, ID_PERUSAHAAN', 'required', 'message'=>'{attribute} harus diisi'),
			array('NAMA', 'length', 'max'=>45),
            array(
                'LOGO',
                'file',
                'types'=>'jpg, jpeg, png',
                'allowEmpty' => true,
                'maxSize'=>1024 * 500,//500kb
				'tooLarge'=>'Ukuran maksimal 500 KB',
            ),
			array('KETERANGAN', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_DIVISI, ID_PERUSAHAAN, NAMA, KETERANGAN, LOGO', 'safe', 'on'=>'search'),
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
            'Mdivisi' => array(self::HAS_MANY, 'User', 'ID_DIVISI'),
            'Perusahaan' => array(self::BELONGS_TO, 'Perusahaan', 'ID_PERUSAHAAN')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_DIVISI' => 'Id Divisi',
			'ID_PERUSAHAAN' => 'Perusahaan',
			'NAMA' => 'Nama Divisi',
			'KETERANGAN' => 'Keterangan',
			'LOGO' => 'Logo',
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

		$criteria->compare('ID_DIVISI',$this->ID_DIVISI);
		$criteria->compare('ID_PERUSAHAAN',$this->ID_PERUSAHAAN);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('KETERANGAN',$this->KETERANGAN,true);
		$criteria->compare('LOGO',$this->LOGO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    //menampilkan logo Divisi
    public function displayPicture($pictureName)
    {
        if($pictureName==null || $pictureName=='tidakadalogo.jpg')
            echo '<img src="'.Yii::app()->theme->baseUrl.'/img/profilethumb.png" alt="" class="img-polaroid" />';
        else
            echo '<img src="'.Yii::app()->request->baseUrl.'/file/logo/divisi/'.$pictureName.'" alt="" class="img-polaroid"/>';
    }
    
    //mengambil semua list data DIVISI
    public static function getAll()
    {
        $criteria=new CDbCriteria;
        $criteria->order = 'NAMA ASC';
        $model = Divisi::model()->findAll($criteria);
        $data = CHtml::listData($model,'ID_DIVISI','NAMA');
        return $data;
    }
}