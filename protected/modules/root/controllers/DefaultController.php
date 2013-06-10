<?php

class DefaultController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl', //perform access control for CRUD operations
        );
    }
    
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(
                    'create',
                    'update',
                    'delete',
                    'ubahpassword',
                    'index',
                    'view',
                ),
				'users'=>array('@'),
                //'roles'=>array(WebUser::ROLE_SUPER_ADMIN),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
	public function actionIndex()
	{
        $model = new User;
		$this->render('index',array(
            'model'=>$model,
        ));
	}
    
    public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}