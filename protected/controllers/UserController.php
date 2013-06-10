<?php

class UserController extends Controller
{
    //public $layout = '/layouts/_front_column1';
//	public function actionIndex()
//	{
//		$this->render('index');
//	}
    public function actionLoginPt(){
        if(!WebUser::isGuest() && WebUser::isUserPT())
        {
            $this->redirect(array('/pt'));
        }
        else
        {
            $model = new LoginPTForm;
            if(isset($_POST['LoginPTForm']))
            {
                $model->attributes=$_POST['LoginPTForm'];
                if($model->validate() && $model->login())
                    $this->redirect (array('./pt'));
            }
            $this->render('login_pt',array('model'=>$model));
        }
    }
    public function actionLoginKopertis(){
        if(!WebUser::isGuest() && WebUser::isKopertis())
        {
            $this->redirect(array('/kopertis'));
        }
        else
        {
            $model = new LoginKopertisForm;
            if(isset($_POST['LoginKopertisForm']))
            {
                $model->attributes=$_POST['LoginKopertisForm'];
                if($model->validate() && $model->login())
                    $this->redirect (array('./kopertis'));
            }
            $this->render('login_kopertis',array('model'=>$model));
        }
    }
    public function actionLoginJuri(){
        if(!WebUser::isGuest() && WebUser::isJuri())
        {
            $this->redirect(array('/juri'));
        }
        else
        {
            $model = new LoginJuriForm;
            if(isset($_POST['LoginJuriForm']))
            {
                $model->attributes=$_POST['LoginJuriForm'];
                if($model->validate() && $model->login())
                    $this->redirect (array('/juri'));
            }
            $this->render('login_juri',array('model'=>$model));
        }
    }
    public function actionLoginPeserta(){
        if(!WebUser::isGuest() && WebUser::isPeserta())
        {
            $this->redirect(array('/peserta'));
        }
        else
        {
            $model = new LoginPesertaForm;
            if(isset($_POST['LoginPesertaForm']))
            {
                $model->attributes=$_POST['LoginPesertaForm'];
                $model->username=m_peserta::removeSeparator($model->username);
                if($model->validate())
                {
                    if($model->validate() && $model->login())
                        $this->redirect (array('./peserta'));
                }
            }
            $this->render('login_peserta',array('model'=>$model));
        }
    }
    // Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}