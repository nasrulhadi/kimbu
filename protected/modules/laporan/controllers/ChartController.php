<?php

class ChartController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
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
        
        public function actionJsChart(){
                $this->layout = '//layouts/blankLayout';
                $model = new Respon('search');
                $model->unsetAttributes();
                $model->ID_SURVEI = 1;
                $model->ID_USER = Yii::app()->user->idUser;
                $model->dbCriteria->order='ID_RESPON DESC';
                $model->dbCriteria->condition = 'APPROVAL <> 2';
                
		$this->render('jschart', array('model'=>$model));
        }
}