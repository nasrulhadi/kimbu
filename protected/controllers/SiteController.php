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
        if (!Yii::app()->user->isGuest) {
            $model = new User;
            $this->setPageTitle('Beranda - ' . Yii::app()->name);
            $this->render('index', array('model' => $model));
        }else {
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

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

    public function actionRegister()
    {
        $this->layout = '//layouts/blankLayout';
        
        $model = new User();
        if(isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];
            if($model->validate())
            {
                $model->setAttribute('PASSWORD', md5($model->PASSWORD));
                $model->setAttribute('CPASSWORD', md5($model->CPASSWORD));
                if($model->save())
                {
                    Yii::app()->user->setFlash('login','Selamat! Register telah berhasil. Silahkan masuk ke dalam sistem kami.');
                    $this->redirect(Yii::app()->createUrl('./site/login'));
                }
            }
        }
        
        $this->render('register', array('model'=>$model));
    }
    
    public function actionForgot()
    {
        $this->layout = '//layouts/blankLayout';
        
        $model = new User();
        if(isset($_POST['User']))
        {
//            $record = User::model()->findByAttributes(array(
//                //'condition'=>'EMAIL=:email',
//                'EMAIL'=>$_POST['User']['EMAIL']
//            ));
//            $model->attributes = $_POST['User'];
              $model->setAttribute('PASSWORD', $model->generatePassword());
//            if($model->save())
//            {
                $model->sendEmailUser();
                Yii::app()->user->setFlash('info',MyFormatter::alertSuccess('Silahkan dicek pada Email Anda.'));
                $this->refresh();
//            }
        }
        $this->render('forgot',array(
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
				$this->redirect(Yii::app()->user->returnUrl);
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