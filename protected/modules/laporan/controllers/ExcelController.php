<?php

class ExcelController extends Controller
{
	public function actionIndex($id)
	{
		$survei = Survei::model()->findByPk($id);
                $render = false;
                
                if(WebUser::isAdmin() || WebUser::isClient()){
                   $this->layout = '//layouts/blankLayout';
                   $this->render('index',array('model'=>$survei));
                }else{
                    Yii::app()->user->setFlash('info',  MyFormatter::alertWarning('<strong>Error!</strong> Anda tidak diperkenankan mengakses halaman tersebut.'));
                    $this->redirect(array('/site/logout'));
                }
        }
}