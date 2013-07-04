<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
    public function accessRules()
	{
		return array(
            array('allow',
				'actions'=>array(
                    'error',
				),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(
                    'create',
                    'update',
                    'delete',
                    'ubahpassword',
                    'index',
                    'view',
                    'editfoto',
                ),
				'users'=>array('@'),
                //'roles'=>array(WebUser::ROLE_SUPER_ADMIN),
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
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
            $model->FOTO = CUploadedFile::getInstance($model, 'FOTO');
            //$model->setAttribute('PASSWORD', $model->generatePassword());
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
                        //menyimpan file foto
                        //$fullImgName = 'user'.$model->ID_USER.'-'.$model->FOTO;
                        $imagesPath = realpath(Yii::app()->basePath . '/../file/foto/');
                        $model->FOTO->saveAs($imagesPath . '/' . $model->FOTO);
                    }
                }
                //set password
                $model->setAttribute('PASSWORD', md5($model->PASSWORD));
                $model->setAttribute('REPEAT', md5($model->REPEAT));
                if($model->save())
                {
                    Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<strong>Selamat!</strong> Data telah berhasil disimpan.'));
                    $this->redirect(array('view','id'=>$model->ID_USER));
                }
            }
        }

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_USER));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
        {
            Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Data telah berhasil dihapus.'));
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User', array('pagination'=>false));
        
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
//        $model=new User('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['User']))
//			$model->attributes=$_GET['User'];
//
//		$this->render('admin',array(
//			'model'=>$model,
//		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
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
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    //fungsi ubah password user
    public function actionUbahPassword($id) {
        $user = $this->loadModel($id);
        $model = new UbahPasswordForm;
        if (isset($_POST['UbahPasswordForm'])) {
            $model->attributes = $_POST['UbahPasswordForm'];
            if ($model->validate()) {
                if ($model->cekOldPass($id, $model->OLD)) {
                    if ($model->savePass($id, $model->NEW)) {
                        Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Password telah berhasil diubah.'));
                        $this->redirect(array('view', 'id' => $user->ID_USER));
                    }
                    else
                        Yii::app()->user->setFlash('info', MyFormatter::alertError('<strong>Error!</strong> Password gagal diubah.'));
                }
                else
                    Yii::app()->user->setFlash('info', MyFormatter::alertError('<strong>Error!</strong> Password lama salah.'));
            }
        }
        $this->render('ubahpassword/ubahpassword', array('id'=>$id, 'model' => $model, 'user'=>$user));
    }
    
    //edit foto user
    public function actionEditFoto($id)
	{
        $this->layout = '//layouts/blankLayout';
		$model=$this->loadModel($id);
        $model->scenario = 'editfoto';

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
                    Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Perubahan foto telah disimpan.'));
                    $this->redirect(array('view', 'id'=>$id));
                }
            }
            else
            {
                Yii::app()->user->setFlash('info',MyFormatter::alertError('<strong>Error!</strong> Pastikan ekstensi foto .jpg/.jpeg/.png dan ukuran foto tidak lebih dari 1 MB'));
                $this->redirect(array('index'));
            }
		}

		$this->render('edit_foto',array(
			'model'=>$model,
		));
	}
}
