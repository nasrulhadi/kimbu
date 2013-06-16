<?php

class ChatController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','coba','delete','setmsg','getmsg'),
				'users'=>array('@'),
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
		$model=new Chat;
                $modelUserAktif = new ChatUser;
                
                // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Chat']))
		{
                        if(count($_POST['Chat']['DIBUAT_OLEH']) >= 1 || $_POST['Chat']['NAMA'] != "")
                        {
                                $model->NAMA = $_POST['Chat']['NAMA'];
                                $model->DIBUAT_OLEH = Yii::app()->user->getState('idUser');
                                $model->DIBUAT_TANGGAL = date("Y-m-d H:i:s");
                                $model->TERAKHIR_UPDATE = null;
                                $model->STATUS = 1;
                                $model->save();
                                
                                $modelUserAktif->ID_CHAT = $model->ID_CHAT;
                                $modelUserAktif->ID_USER = Yii::app()->user->getState('idUser');
                                $modelUserAktif->NOTIFIKASI = 0;
                                $modelUserAktif->STATUS = 1;
                                $modelUserAktif->save();

                                for($i=0;$i<=count($_POST['Chat']['DIBUAT_OLEH'])-1;$i++){
                                    $modelUserOnline = new ChatUser;
                                    $modelUserOnline->ID_CHAT = $model->ID_CHAT;
                                    $modelUserOnline->ID_USER = $_POST['Chat']['DIBUAT_OLEH'][$i];
                                    $modelUserOnline->NOTIFIKASI = 1;
                                    $modelUserOnline->STATUS = 1;
                                    $modelUserOnline->save();
                                }
                        }else{
                                Yii::app()->user->setFlash('pesanError','<strong>Error</strong>. Nama Ruang tidak boleh kosong dan User harus dipilih (salah satu)');
				$this->redirect(array('create'));
                        }
			
                        $this->redirect(array('view','id'=>$model->ID_CHAT));
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

		if(isset($_POST['Chat']))
		{
			$model->attributes=$_POST['Chat'];
			if($model->save())
                                Yii::app()->user->setFlash('pesanSukses','Update Nama Obrolan Berhasil');
				$this->redirect(array('update','id'=>$model->ID_CHAT));
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$model->setAttribute('STATUS', 1);
			if($model->save())
                                Yii::app()->user->setFlash('pesanSukses','Hapus Obrolan Berhasil');
				$this->redirect(array('index'));
		
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria = new CDbCriteria();
        $criteria->condition = "STATUS = :statusUser AND DIBUAT_OLEH = :userOnline";
        $criteria->params = array(':userOnline' => Yii::app()->user->getState('idUser'),
                                  ':statusUser' => 1);

        $dataProvider=new CActiveDataProvider('Chat', array('criteria' => $criteria));
        
        $model=new Chat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Chat']))
			$model->attributes=$_GET['Chat'];
        
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Chat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Chat']))
			$model->attributes=$_GET['Chat'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Chat the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Chat::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Chat $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='chat-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionCoba() 
        {
                $this->layout = '//layouts/blankLayout';
                $username = 'rico';
                $Criteria = new CDbCriteria();
                $Criteria->condition = "USERNAME = :username";
                $Criteria->params = array(':username' => $username);
                $UserOut = User::model()->find($Criteria);
                
                echo $UserOut->NAMA;
                
                
                $UserOut->setAttribute('TLP', '081222');
                $UserOut->save();
        }
        
        
        public function actionSetmsg($id)
        {
                $modelUserOnline = new ChatPesan;
                
                if(isset($_POST['text'])){
                    
                        $text = $_POST['text'];
                        $modelUserOnline->ID_CHAT = $id;
                        $modelUserOnline->ID_USER = Yii::app()->user->getState('idUser');
                        $modelUserOnline->PESAN = $_POST['text'];
                        $modelUserOnline->STATUS = 1;
                        $modelUserOnline->save();
                }
        }
        
        public function actionGetmsg($id)
        {
                $model = ChatUser::model()->findByPk($id);
                
                $this->layout = '//layouts/blankLayout';
                $this->renderPartial('chatmsg',array(
			'model'=>$model,
		));
        }
}
