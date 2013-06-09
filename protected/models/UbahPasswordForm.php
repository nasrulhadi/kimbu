<?php
class UbahPasswordForm extends CFormModel
{
	public $OLD;
	public $NEW;
	public $REPEAT;
	
	public function rules()
	{		
		return array(
			array(
				'OLD, NEW, REPEAT',
				'required',
				'message'=>'{attribute} harus diisi',
			),
			array('NEW, REPEAT', 'length', 'min'=>6, 'max'=>40,'message'=>'Password minimal 6 karakter'),
            array('NEW', 'compare', 'compareAttribute'=>'REPEAT','message'=>'Password tidak cocok'),
        );
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'OLD'=>'Password Lama',
			'NEW'=>'Password Baru',
			'REPEAT'=>'Confirm Password Baru'
		);
	}
	
	public function cekOldPassword($password)
	{
		$model=User::model()->findByPk(Yii::app()->user->id);
		if(md5($password)!=$model->PASSWORD)
			return false;
		else
			return true;
	}
	
	public function savePassword($password)
	{
		$model=User::model()->findByPk(Yii::app()->user->id);
		$model->setAttribute('PASSWORD',md5($password));
		if($model->save())
			return true;
		else
			return false;
	}
}
?>