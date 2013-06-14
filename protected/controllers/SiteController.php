<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        if (!WebUser::isGuest() && WebUser::isRoot()) {
                $this->redirect(array('/root'));
        }
        elseif (!WebUser::isGuest() && WebUser::isAdmin()) {
                $this->redirect(array('/admincs'));
        }
        elseif (!WebUser::isGuest() && WebUser::isSurveyor()) {
                $this->redirect(array('/surveyor'));
        }
        elseif (!WebUser::isGuest() && WebUser::isClient()) {
                $this->redirect(array('/client'));
        }
        else
        {
            $this->redirect(array('login'));
        }
	}

	/**
	 * This is the action to handle external exceptions.
	 */
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

    public function actionForgot()
    {
        $this->layout = '//layouts/blankLayout';
        
        $model = new User();
        if(isset($_POST['User']))
        {
            $model->attributes = $_POST['User'];
//            if($model->save())
//            {
                //$id = 1;
               // User::model()->updateByPk($id, array('PASSWORD'=>$model->generatePassword()));
                
                $model->sendEmail();
                Yii::app()->user->setFlash('info',MyFormatter::alertForgot('Silahkan dicek pada Email Anda.'));
                $this->refresh();
//            }
        }
        $this->render('forgot',array(
            'model'=>$model,
        ));
    }
    
    public function actionForgotPassword($id)
    {
        $this->layout = '//layouts/blankLayout';
        
        $kode = substr($id, -1);
        $model = User::model()->findByPk($kode);
        
//        if(isset($_POST['User']))
//        {
//            $model->attributes = $_POST['User'];
            //$model->setAttribute('PASSWORD', $model->generatePassword());
            //if($model->save())
            //{
                $tes = $model->generatePassword();
                User::model()->updateByPk($kode, array('PASSWORD'=>md5($tes)));
                $model->sendEmailUser($tes);
            //}
//        }
        
        //$model->setAttribute('PASSWORD', $model->generatePassword());
        
        $this->render('_index',array(
            'model'=>$model,
        ));
    }

    /**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        $this->layout = '//layouts/blankLayout';
        
		$model=new LoginForm;

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
                if(Yii::app()->user->isLogin)
                {
                    //mengupdate login terakkhir user
                    $userid = Yii::app ()->user->idUser;
                    $timestamp = date('Y-m-d H:i:s');
                    User::model()->updateByPk($userid, array('TERAKHIR_LOGIN'=>$timestamp));

                    $this->redirect(Yii::app()->user->returnUrl);
                }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}