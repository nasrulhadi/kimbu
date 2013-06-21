<?php

class DivisiController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model=new Divisi;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Divisi']))
		{
			$model->attributes=$_POST['Divisi'];
			$model->LOGO = CUploadedFile::getInstance($model, 'LOGO');
			if($model->validate())
            {
                //menyimpan file logo
                $imagesPath = realpath(Yii::app()->basePath . '/../file/logo/divisi');
                $model->LOGO->saveAs($imagesPath . '/' . $model->LOGO);
                if($model->save())
                {
                    Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<strong>Selamat!</strong> Data telah berhasil disimpan.'));
                    $this->redirect(array('view','id'=>$model->ID_DIVISI));
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

//		if(isset($_POST['Divisi']))
//		{
//			$model->attributes=$_POST['Divisi'];
//            $model->LOGO = CUploadedFile::getInstance($model, 'LOGO');
//			if($model->validate())
//            {
//                //menyimpan file logo
//                $imagesPath = realpath(Yii::app()->basePath . '/../file/logo/divisi');
//                $model->LOGO->saveAs($imagesPath . '/' . $model->LOGO);
//                if($model->save())
//                {
//                    Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('<strong>Selamat!</strong> Perubahan data telah berhasil disimpan.'));
//                    $this->redirect(array('view','id'=>$model->ID_DIVISI));
//                }
//            }
//		}
        
        if(isset($_POST['Divisi']))
		{
			$model->attributes=$_POST['Divisi'];
            if($model->validate())
            {
                if (CUploadedFile::getInstance($model, 'LOGO') != NULL) {
                    //jika sebelumnya telah mengupload file portofolio
                    if ($model->LOGO != NULL && file_exists(Yii::app()->basePath . '/../file/logo/divisi/' . $model->FOTO)) {
                        // maka dihapus filenya, diganti dengan yang baru
                        unlink(Yii::app()->basePath . '/../file/logo/divisi/' . $model->FOTO);
                    }
                    //mengambil value dari fileupload
                    $model->LOGO = CUploadedFile::getInstance($model, 'LOGO');
                    if ($model->LOGO) {
                        $fullImgName = $model->ID_DIVISI.'-logo-'.$model->LOGO;
                        //mengcopy file ke drive server
                        $model->LOGO->saveAs(Yii::app()->basePath . '/../file/logo/divisi/' . $fullImgName);
                        $model->setAttribute('LOGO', $fullImgName); //memberikan nama lampiran sesuai dengan nama file yang diupload
                    }
                }
                if($model->save())
                {
                    Yii::app()->user->setFlash('info', MyFormatter::alertSuccess('Perubahan telah disimpan.'));
                    $this->redirect(array('view','id'=>$model->ID_DIVISI));
                }
            }
            else
            {
                Yii::app()->user->setFlash('info',MyFormatter::alertError('<strong>Error!</strong> Pastikan ekstensi foto .jpg/.jpeg/.png dan ukuran foto tidak lebih dari 1 MB'));
                $this->refresh();
            }
//			
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
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $dataProvider=new CActiveDataProvider('Divisi',array(
            'pagination'=>array(
                'pageSize'=>10,
            ),
        ));
        
		$model=new Divisi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Divisi']))
			$model->attributes=$_GET['Divisi'];

		$this->render('admin',array(
			'model'=>$model,
            'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Divisi('search');
		$model->unsetAttributes();  // clear any default values
        
		if(isset($_GET['Divisi']))
			$model->attributes=$_GET['Divisi'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Divisi the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Divisi::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Divisi $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='divisi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
