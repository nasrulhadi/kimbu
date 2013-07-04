<?php

/**
 * This is the model class for table "perusahaan".
 *
 * The followings are the available columns in table 'perusahaan':
 * @property integer $ID_PERUSAHAAN
 * @property string $NAMA
 * @property string $EMAIL
 * @property string $TLP
 * @property string $FAX
 * @property string $LOGO
 * @property string $ALAMAT
 * @property string $KOTA
 * @property string $KETERANGAN
 * @property string $TERAKHIR_UPDATE
 */
class Perusahaan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Perusahaan the static model class
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
		return 'perusahaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NAMA, EMAIL, TLP, FAX, KOTA', 'length', 'max'=>45),
			array('ALAMAT, KETERANGAN, TERAKHIR_UPDATE', 'safe'),
            array('NAMA, EMAIL', 'required', 'message'=>'{attribute} harus diisi'),
            array('EMAIL', 'email'),
            array(
                'LOGO',
                'file',
                'types'=>'jpg, jpeg, png',
                'allowEmpty' => true,
                'maxSize'=>1024 * 500,//500kb
				'tooLarge'=>'Ukuran maksimal 500 KB',
            ),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_PERUSAHAAN, NAMA, EMAIL, TLP, FAX, LOGO, ALAMAT, KOTA, KETERANGAN, TERAKHIR_UPDATE', 'safe', 'on'=>'search'),
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
			'ID_PERUSAHAAN' => 'Id Perusahaan',
			'NAMA' => 'Nama Perusahaan',
			'EMAIL' => 'Email',
			'TLP' => 'No. Telepon',
			'FAX' => 'Fax',
			'LOGO' => 'Logo',
			'ALAMAT' => 'Alamat',
			'KOTA' => 'Kota',
			'KETERANGAN' => 'Keterangan',
			'TERAKHIR_UPDATE' => 'Terakhir Update',
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

		$criteria->compare('ID_PERUSAHAAN',$this->ID_PERUSAHAAN);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('TLP',$this->TLP,true);
		$criteria->compare('FAX',$this->FAX,true);
		$criteria->compare('LOGO',$this->LOGO,true);
		$criteria->compare('ALAMAT',$this->ALAMAT,true);
		$criteria->compare('KOTA',$this->KOTA,true);
		$criteria->compare('KETERANGAN',$this->KETERANGAN,true);
		$criteria->compare('TERAKHIR_UPDATE',$this->TERAKHIR_UPDATE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    //menampilkan logo perusahaan
    public function displayPicture($pictureName)
    {
        if($pictureName==null || $pictureName=='tidakadalogo.jpg')
            echo '<img src="'.Yii::app()->theme->baseUrl.'/img/tidakadalogo.jpg" alt="" class="img-polaroid" />';
        else
            echo '<img src="'.Yii::app()->request->baseUrl.'/file/logo/perusahaan/'.$pictureName.'" alt="" class="img-polaroid"/>';
    }
    
    //tampilan logo cilik
    public function displayLogoPicture($pictureName)
    {
        if($pictureName==null || $pictureName=='tidakadalogo.jpg')
            echo '<img src="'.Yii::app()->theme->baseUrl.'/img/tidakadalogo.jpg" alt="" style="height: 50px; width: 70px" />';
        else
            echo '<img src="'.Yii::app()->request->baseUrl.'/file/logo/perusahaan/'.$pictureName.'" alt="" style="height: 50px; width: 50px" />';
    }
    
    //mengambil semua list data PERUSAHAAN
    public static function getAll()
    {
        $criteria=new CDbCriteria;
        $criteria->order = 'NAMA ASC';
        $model = Perusahaan::model()->findAll($criteria);
        $data = CHtml::listData($model,'ID_PERUSAHAAN','NAMA');
        return $data;
    }
}