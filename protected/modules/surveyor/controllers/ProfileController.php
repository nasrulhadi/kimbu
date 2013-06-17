<?php

class ProfileController extends Controller
{

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(
                    'index',
                    'setting',
                    'ubahpassword',
                ),
				'users'=>array('@'),
                'roles'=>array(WebUser::ROLE_SURVEYOR),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionIndex()
	{
        $id=Yii::app()->user->idUser;
		$this->render('index',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionSetting()
	{
        $id=Yii::app()->user->idUser;
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
            {
                Yii::app()->user->setFlash('info',  MyFormatter::alertSuccess('<strong>Sukses!</strong> Perubahan telah disimpan.'));
				$this->redirect(array('index'));
            }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
    
    public function actionUbahPassword() {
        $model = new UbahPasswordForm;
        if (isset($_POST['UbahPasswordForm'])) {
            $model->attributes = $_POST['UbahPasswordForm'];
            if ($model->validate()) {
                if ($model->cekOldPassword($model->OLD)) {
                    if ($model->savePassword($model->NEW)) {
                        Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Password telah berhasil diubah.'));
                        $this->refresh();
                    }
                    else
                        Yii::app()->user->setFlash('info', MyFormatter::alertError('<strong>Error!</strong> Password gagal diubah.'));
                }
                else {
                    Yii::app()->user->setFlash('info', MyFormatter::alertError('<strong>Error!</strong> Password lama salah.'));
                }
            }
        }
        $this->render('ubahpassword/ubahpassword', array('model' => $model));
    }

    public function actionEditFoto()
	{
        $this->layout = '//layouts/blankLayout';
        $id=Yii::app()->user->idUser;
		$model=$this->loadModel($id);
        $model->scenario = 'editfoto';

		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
            if($model->validate())
            {
                if (CUploadedFile::getInstance($model, 'FOTO') != NULL) {
                    //jika sebelumnya telah mengupload file portofolio
                    if ($model->FOTO != NULL && file_exists(Yii::app()->basePath . '/../file/foto/' . $model->FOTO)) {
                        // maka dihapus filenya, diganti dengan yang baru
                        unlink(Yii::app()->basePath . '/../file/foto/' . $model->FOTO);
                    }
                    //mengambil value dari fileupload
                    $model->FOTO = CUploadedFile::getInstance($model, 'FOTO');
                    if ($model->FOTO) {
                        $fullImgName = $model->ID_USER.'-foto-'.$model->FOTO;
                        //mengcopy file ke drive server
                        $model->FOTO->saveAs(Yii::app()->basePath . '/../file/foto/' . $fullImgName);
                        $model->setAttribute('FOTO', $fullImgName); //memberikan nama lampiran sesuai dengan nama file yang diupload
                    }
                }
                if($model->save())
                {
                    Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('Perubahan telah disimpan.'));
                    $this->redirect(array('index'));
                }
            }
            else
            {
                Yii::app()->user->setFlash('info',MyFormatter::alertError('<strong>Error!</strong> Pastikan ekstensi foto .jpg/.jpeg/.png dan ukuran foto tidak lebih dari 1 MB'));
                $this->redirect(array('index'));
            }
//			
		}

		$this->render('edit_foto',array(
			'model'=>$model,
		));
	}
    
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
