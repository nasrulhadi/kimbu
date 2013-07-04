<?php

class PublikController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

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
				'actions'=>array('index','view', 'detailsurvei', 'update', 'input'),
				'users'=>array('@'),
			),
                        array('allow',
				'actions'=>array('approve','unapprove', 'hapus', 'prehapus'),
				'expression'=> '!Yii::app()->user->isGuest && Yii::app()->user->type == 2',
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
                $respon = Respon::model()->findByPk($id);
                $render = false;
                
                if(WebUser::isAdmin()){
                    if($respon->APPROVAL == 0){
                        $render = true;
                    }
                } elseif (WebUser::isSurveyor()) {
                    if($respon->APPROVAL == 1 && $respon->ID_USER == Yii::app()->user->idUser){
                        $render = true;
                    }
                } elseif (WebUser::isClient()) {
                    $render = true;
                }
                
                if($render){
                    $survei = $respon->iDRESPON;
                    $this->render('view',array('model'=>$survei,'respon'=>$respon,));
                }else{
                    Yii::app()->user->setFlash('info',  MyFormatter::alertWarning('<strong>Error!</strong> Anda tidak diperkenankan mengakses halaman tersebut.'));
                    $this->redirect(array('detailsurvei', 'id' => $respon->iDRESPON->ID_SURVEI));
                }
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
        public function actionInput($id)
	{
		$survei = Survei::model()->findByPk($id);
                $render = false;
                
                if(WebUser::isSurveyor()){
                    $render = true;
                }
                
                if($render){               
	
                        if(!empty($_POST)){

                                $respon = new Respon;
                                $respon->ID_SURVEI = $survei->ID_SURVEI;
                                $respon->NAMA = Yii::app()->user->name;
                                $respon->TANGGAL_PENGISIAN = date("Y-m-d H:i:s");
                                $respon->TANGGAL_APPROVAL = date("Y-m-d H:i:s");
                                $respon->ID_USER = Yii::app()->user->idUser;
                                $respon->save();
                                $respon->ID_RESPON;
                                foreach($survei->surveiForms as $used_form){
                                        foreach($used_form->surveiPertanyaans as $question){
                                                $respon_detail = new ResponDetail;
                                                if($question->TYPE!=SurveiPertanyaan::UPLOAD){
                                                        if(isset($_POST[$used_form->ID_SURVEI_FORM][$question->ID_SURVEI_PERTANYAAN])){
                                                                $respon_detail->RESPON = json_encode($_POST[$used_form->ID_SURVEI_FORM][$question->ID_SURVEI_PERTANYAAN]);
                                                        }
                                                }
                                                else{
                                                $upload_data = CUploadedFile::getInstanceByName($used_form->ID_SURVEI_FORM.'['.$question->ID_SURVEI_PERTANYAAN.']');
                                                if(!is_null($upload_data)){
                                                                $inputFileName = Yii::app()->basePath.'/../file/survei/'.$upload_data->getName();
                                                                $upload_data->saveAs($inputFileName);
                                                                $respon_detail->RESPON = json_encode(Yii::app()->baseUrl.'file/survei/'.$upload_data->getName());
                                                        }
                                                }
                                                // get nama toko atau nama user end
                                                if(isset($question->HINT) && $question->HINT == "NAMA"){
                                                    Respon::model()->updateByPk($respon->ID_RESPON, array('NAMA' => $_POST[$used_form->ID_SURVEI_FORM][$question->ID_SURVEI_PERTANYAAN]));
                                                }
                                                $respon_detail->ID_PERTANYAAN = $question->ID_SURVEI_PERTANYAAN;
                                                $respon_detail->ID_RESPON = $respon->ID_RESPON;
                                                $respon_detail->save();

                                        }
                                }
                                
                                Yii::app()->user->setFlash('info',  MyFormatter::alertSuccess('<strong>Sukses!</strong> Data survei berhasil di input.'));
                                $this->redirect(Yii::app()->createUrl('/survei/publik/update/'.$respon->ID_RESPON));
                        }

                        $this->render('input',array('model'=>$survei));
                        
                } else {
                    Yii::app()->user->setFlash('info',  MyFormatter::alertWarning('<strong>Error!</strong> Anda tidak diperkenankan mengakses halaman tersebut.'));
                    $this->redirect(array('detailsurvei', 'id' => $id));
                }
	}
        
        
	public function actionUpdate($id)
	{
		$respon = Respon::model()->findByPk($id);
		$survei = $respon->iDRESPON;
                
                $render = false;
                
                if(WebUser::isAdmin()){
                    if($respon->APPROVAL == 1){
                        $render = true;
                    }
                } elseif (WebUser::isSurveyor()) {
                    if($respon->APPROVAL == 0 && $respon->ID_USER == Yii::app()->user->idUser){
                        $render = true;
                    }
                }
                
                if($render){               
	
                        if(!empty($_POST)){

                                foreach($survei->surveiForms as $used_form){
                                        foreach($used_form->surveiPertanyaans as $question){
                                                $respon_detail = ResponDetail::model()->findByAttributes(array('ID_PERTANYAAN'=>$question->ID_SURVEI_PERTANYAAN,'ID_RESPON'=>$respon->ID_RESPON,));
                                                if(is_null($respon_detail)){
                                                        $respon_detail = new ResponDetail;
                                                }
                                                if($question->TYPE!=SurveiPertanyaan::UPLOAD){
                                                        if(isset($_POST[$used_form->ID_SURVEI_FORM][$question->ID_SURVEI_PERTANYAAN])){
                                                                $respon_detail->RESPON = json_encode($_POST[$used_form->ID_SURVEI_FORM][$question->ID_SURVEI_PERTANYAAN]);
                                                        }
                                                }
                                                else{
                                                $upload_data = CUploadedFile::getInstanceByName($used_form->ID_SURVEI_FORM.'['.$question->ID_SURVEI_PERTANYAAN.']');
                                                if(!is_null($upload_data)){
                                                                $inputFileName = Yii::app()->basePath.'/../file/survei/'.$upload_data->getName();
                                                                $upload_data->saveAs($inputFileName);
                                                                $respon_detail->RESPON = json_encode(Yii::app()->baseUrl.'file/survei/'.$upload_data->getName());
                                                        }
                                                }
                                                if(isset($question->HINT) && $question->HINT == "NAMA"){
                                                    Respon::model()->updateByPk($respon->ID_RESPON, array('NAMA' => $_POST[$used_form->ID_SURVEI_FORM][$question->ID_SURVEI_PERTANYAAN]));
                                                }
                                                $respon_detail->ID_PERTANYAAN = $question->ID_SURVEI_PERTANYAAN;
                                                $respon_detail->ID_RESPON = $respon->ID_RESPON;
                                                $respon_detail->save();

                                        }
                                }
                                Yii::app()->user->setFlash('info',  MyFormatter::alertSuccess('<strong>Sukses!</strong> Update data survei berhasil.'));
                                $this->redirect(Yii::app()->createUrl('/survei/publik/update/'.$respon->ID_RESPON));
                        }

                        $this->render('update',array('model'=>$survei,'respon'=>$respon,));
                        
                } else {
                    Yii::app()->user->setFlash('info',  MyFormatter::alertWarning('<strong>Error!</strong> Anda tidak diperkenankan mengakses halaman tersebut.'));
                    $this->redirect(array('detailsurvei', 'id' => $respon->iDRESPON->ID_SURVEI));
                }
	}


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
                $this->render('index');
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Survei the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Survei::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Survei $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='survei-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
        public function actionDetailSurvei($id)
        {
		$model = new Respon('search');
                $model->unsetAttributes();       
		$model->ID_SURVEI = $id;
		$this->render('detail', array('model'=>$model));
	}
        
        
        public function actionApprove($id)
        {
                Respon::model()->updateByPk($id, array('APPROVAL'=>1, 'TANGGAL_APPROVAL' => date("Y-m-d H:i:s")));
                
		$respon = Respon::model()->findByPk($id);
                Yii::app()->user->setFlash('info',  MyFormatter::alertSuccess('<strong>Sukses!</strong> Survei berhasil disetujui.'));
                $this->redirect(Yii::app()->createUrl('/survei/publik/update/'.$respon->ID_RESPON));
	}
        
    
        public function actionUnApprove($id)
        {
                Respon::model()->updateByPk($id, array('APPROVAL'=>0));
                
		$respon = Respon::model()->findByPk($id);
                Yii::app()->user->setFlash('info',  MyFormatter::alertSuccess('<strong>Sukses!</strong> Persetujuan survei berhasil dibatalkan.'));
                $this->redirect(Yii::app()->createUrl('/survei/publik/view/'.$respon->ID_RESPON));
	}
        
        
        public function actionPreHapus($id)
        {
                $respon = Respon::model()->findByPk($id);
                
		$survei = $respon->iDRESPON;
		$this->render('prehapus',array('model'=>$survei,'respon'=>$respon,));
        }
        
        
        public function actionHapus($id)
        {
                Respon::model()->updateByPk($id, array('APPROVAL'=>2));
                
                $respon = Respon::model()->findByPk($id);
		$survei = $respon->iDRESPON;
                Yii::app()->user->setFlash('info',  MyFormatter::alertSuccess('<strong>Sukses!</strong> Proses hapus data berhasil.'));
                $this->redirect(Yii::app()->createUrl('/survei/publik/detailsurvei/'.$survei->ID_SURVEI));
        }
}
