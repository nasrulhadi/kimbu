<?php

class SurveiController extends Controller
{
	public function actionIndex()
	{
		$this->layout = '//layouts/column1';
		$model = new Survei;
		$this->render('admin',array('model'=>$model));
	}
	
	public function actionInput($id){
		
		$survei = Survei::model()->findByPk($id);
	
		if(!empty($_POST)){
			$respon = new Respon;
			$respon->ID_SURVEI = $survei->ID_SURVEI;
			$respon->NAMA = Yii::app()->user->name;
			$respon->save();
			$respon->ID_RESPON;
			foreach($_POST as $used_form){
				foreach($used_form as $question_id=>$detail_respon){
					$respon_detail = new ResponDetail;
					$respon_detail->RESPON = json_encode($detail_respon);
					$respon_detail->ID_PERTANYAAN = $question_id;
					$respon_detail->ID_RESPON = $respon->ID_RESPON;
					$respon_detail->save();
				
				}
			}
			$this->redirect('index');
		}
		
		$this->render('input',array('model'=>$survei));
	}
	
	public function actionDetailSurvei($id){
		$this->layout = '//layouts/column1';
		$model = new Respon;
		$model->ID_SURVEI = $id;
		$model->NAMA = Yii::app()->user->name;
		$this->render('detail',array('model'=>$model));
	}
}