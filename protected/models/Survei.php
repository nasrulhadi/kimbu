<?php

/**
 * This is the model class for table "survei".
 *
 * The followings are the available columns in table 'survei':
 * @property integer $ID_SURVEI
 * @property string $NAMA_SURVEI
 * @property integer $STATUS
 * @property string $KETERANGAN
 * @property integer $ID_DIVISI
 * @property string $TANGGAL_DIBUAT
 *
 * The followings are the available model relations:
 * @property Respon $respon
 * @property Divisi $iDDIVISI
 * @property SurveiForm[] $surveiForms
 */
class Survei extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Survei the static model class
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
		return 'survei';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NAMA_SURVEI', 'required'),
			array('STATUS, ID_DIVISI', 'numerical', 'integerOnly'=>true),
			array('NAMA_SURVEI, KETERANGAN', 'length', 'max'=>255),
			array('TANGGAL_DIBUAT', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_SURVEI, NAMA_SURVEI, STATUS, KETERANGAN, ID_DIVISI, TANGGAL_DIBUAT', 'safe', 'on'=>'search'),
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
			'respons' => array(self::HAS_MANY, 'Respon', 'ID_RESPON'),
			'iDDIVISI' => array(self::BELONGS_TO, 'Divisi', 'ID_DIVISI'),
			'surveiForms' => array(self::HAS_MANY, 'SurveiForm', 'ID_SURVEI'),
			'count' => array(self::STAT,'Respon','ID_SURVEI',
                                                'select'=>'count(*)',
                                                'condition'=>'ID_USER = :idUser',
                                                'params'=>array(':idUser'=>Yii::app()->user->idUser,),
                                                ),	
			'countNotApproved' => array(self::STAT,'Respon','ID_SURVEI',
                                                'select'=>'count(*)',
                                                'condition'=>'APPROVAL = 0',
                                                ),			
			'countAll' => array(self::STAT,'Respon','ID_SURVEI',
                                                'select'=>'count(*)',
                                                ),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_SURVEI' => 'Id Survei',
			'NAMA_SURVEI' => 'Nama Survei',
			'STATUS' => 'Status',
			'KETERANGAN' => 'Keterangan',
			'ID_DIVISI' => 'Id Divisi',
            'TYPE' => 'Tipe Survei',
			'TANGGAL_DIBUAT' => 'Tanggal Dibuat',
			'count' => 'Jumlah Survei',
			'countAll' => 'Total Semua Survei',
			'countNotApproved' => 'Total Survei Belum Disetujui',
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

		$criteria->compare('ID_SURVEI',$this->ID_SURVEI);
		$criteria->compare('NAMA_SURVEI',$this->NAMA_SURVEI,true);
		$criteria->compare('STATUS',$this->STATUS);
		$criteria->compare('KETERANGAN',$this->KETERANGAN,true);
		$criteria->compare('ID_DIVISI',$this->ID_DIVISI);
		$criteria->compare('TANGGAL_DIBUAT',$this->TANGGAL_DIBUAT,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        //menampilkan foto statik
        public static function displayPicture($pictureName)
        {
                if($pictureName==null || $pictureName=='tidakadafoto.jpg')
                    return '<img src="'.Yii::app()->request->baseUrl.'/images/100x100.gif" alt="" class="img-polaroid" />';
                else
                    return '<img src="'.Yii::app()->request->baseUrl.'/'.$pictureName.'" alt="" class="img-polaroid" style="height:100px; width:100px"/>';
        }
}