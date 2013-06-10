<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class CRootController extends Controller
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
                'roles'=>array(WebUser::ROLE_SUPER_ADMIN),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
}