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
                    'index',
                ),
				'users'=>array('@'),
                'roles'=>array(WebUser::ROLE_CLIENT),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
	public function actionIndex()
	{
		$this->render('index');
	}
}