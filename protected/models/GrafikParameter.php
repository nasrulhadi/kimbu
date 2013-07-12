<?php

/**
 * This is the model class for table "grafik_parameter".
 *
 * The followings are the available columns in table 'grafik_parameter':
 * @property integer $ID_GRAFIK_PARAMETER
 * @property integer $ID_GRAFIK
 * @property string $NAMA
 * @property string $VALUE
 *
 * The followings are the available model relations:
 * @property Grafik $iDGRAFIK
 */
class GrafikParameter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GrafikParameter the static model class
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
		return 'grafik_parameter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_GRAFIK, NAMA, VALUE', 'required'),
			array('ID_GRAFIK', 'numerical', 'integerOnly'=>true),
			array('NAMA, VALUE', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_GRAFIK_PARAMETER, ID_GRAFIK, NAMA, VALUE', 'safe', 'on'=>'search'),
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
			'iDGRAFIK' => array(self::BELONGS_TO, 'Grafik', 'ID_GRAFIK'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_GRAFIK_PARAMETER' => 'Id Grafik Parameter',
			'ID_GRAFIK' => 'Id Grafik',
			'NAMA' => 'Nama',
			'VALUE' => 'Value',
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

		$criteria->compare('ID_GRAFIK_PARAMETER',$this->ID_GRAFIK_PARAMETER);
		$criteria->compare('ID_GRAFIK',$this->ID_GRAFIK);
		$criteria->compare('NAMA',$this->NAMA,true);
		$criteria->compare('VALUE',$this->VALUE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getValue($idGrafik, $nama)
        {
                $grafikParam = GrafikParameter::model()->findByAttributes(array('NAMA' => $nama , 'ID_GRAFIK' => $idGrafik));
                
                return $grafikParam->VALUE;
        }
}