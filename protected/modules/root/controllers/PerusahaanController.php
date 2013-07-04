<?php

class PerusahaanController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

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
                    'index',
                    'view',
                    'editlogo',
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
		$model=new Perusahaan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Perusahaan']))
		{
			$model->attributes=$_POST['Perusahaan'];
            //$model->LOGO = CUploadedFile::getInstance($model, 'LOGO');
			if($model->validate())
            {
                if (CUploadedFile::getInstance($model, 'LOGO') != NULL) {
                    //jika sebelumnya telah mengupload file portofolio
                    if ($model->LOGO != NULL && file_exists(Yii::app()->basePath . '/../file/logo/perusahaan/' . $model->LOGO)) {
                        // maka dihapus filenya, diganti dengan yang baru
                        unlink(Yii::app()->basePath . '/../file/logo/perusahaan/' . $model->LOGO);
                    }
                    //mengambil value dari fileupload
                    $model->LOGO = CUploadedFile::getInstance($model, 'LOGO');
                    if ($model->LOGO) {
                        //menyimpan file foto
                        //$fullImgName = 'user'.$model->ID_USER.'-'.$model->FOTO;
                        $imagesPath = realpath(Yii::app()->basePath . '/../file/logo/perusahaan');
                        $model->LOGO->saveAs($imagesPath . '/' . $model->LOGO);
                    }
                }
                if($model->save())
                {
                    Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<strong>Selamat!</strong> Data telah berhasil disimpan.'));
                    $this->redirect(array('view','id'=>$model->ID_PERUSAHAAN));
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

		if(isset($_POST['Perusahaan']))
		{
			$model->attributes=$_POST['Perusahaan'];
			if($model->save())
            {
                //mengupdate login terakhir user
                $timestamp = date('Y-m-d H:i:s');
                Perusahaan::model()->updateByPk($id, array('TERAKHIR_UPDATE'=>$timestamp));
                Yii::app()->user->setFlash('info',MyFormatter::alertInfo('<strong>Selamat!</strong> Perubahan data telah berhasil disimpan.'));
				$this->redirect(array('view','id'=>$model->ID_PERUSAHAAN));
            }
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
		$dataProvider = new CActiveDataProvider('Perusahaan', array('pagination'=>FALSE));
        
        $this->render('index', array(
            'dataProvider'=>$dataProvider,
        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Perusahaan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Perusahaan']))
			$model->attributes=$_GET['Perusahaan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Perusahaan the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Perusahaan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Perusahaan $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='perusahaan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    //edit foto user
    public function actionEditLogo($id)
	{
        $this->layout = '//layouts/blankLayout';
		$model=$this->loadModel($id);
        $model->scenario = 'editlogo';

		if(isset($_POST['Perusahaan']))
		{
			$model->attributes=$_POST['Perusahaan'];
            if($model->validate())
            {
                if (CUploadedFile::getInstance($model, 'LOGO') != NULL) {
                    //jika sebelumnya telah mengupload file portofolio
                    if ($model->LOGO != NULL && file_exists(Yii::app()->basePath . '/../file/logo/perusahaan/' . $model->LOGO)) {
                        // maka dihapus filenya, diganti dengan yang baru
                        unlink(Yii::app()->basePath . '/../file/logo/perusahaan/' . $model->LOGO);
                    }
                    //mengambil value dari fileupload
                    $model->LOGO = CUploadedFile::getInstance($model, 'LOGO');
                    if ($model->LOGO) {
                        $fullImgName = $model->ID_PERUSAHAAN.'-logo-'.$model->LOGO;
                        //mengcopy file ke drive server
                        $model->LOGO->saveAs(Yii::app()->basePath . '/../file/logo/perusahaan/' . $fullImgName);
                        $model->setAttribute('LOGO', $fullImgName); //memberikan nama lampiran sesuai dengan nama file yang diupload
                    }
                }
                if($model->save())
                {
                    Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('<strong>Selamat!</strong> Perubahan logo telah disimpan.'));
                    $this->redirect(array('view', 'id'=>$id));
                }
            }
            else
            {
                Yii::app()->user->setFlash('info',MyFormatter::alertError('<strong>Error!</strong> Pastikan ekstensi foto .jpg/.jpeg/.png dan ukuran foto tidak lebih dari 500 KB'));
                $this->redirect(array('index'));
            }
		}

		$this->render('edit_logo',array(
			'model'=>$model,
		));
	}
}
