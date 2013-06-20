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
			foreach($survei->surveiForms as $used_form){
				foreach($used_form->surveiPertanyaans as $question){
					$respon_detail = new ResponDetail;
					if($question->TYPE!=SurveiPertanyaan::UPLOAD){
						if(isset($_POST[$used_form->ID_SURVEI_FORM][$question->ID_SURVEI_PERTANYAAN])){
							$respon_detail->RESPON = json_encode($_POST[$used_form->ID_SURVEI_FORM][$question->ID_SURVEI_PERTANYAAN]);
						}
					}
					else{
					$upload_data = CUploadedFile::getInstanceByName($used_form->ID_SURVEI_FORM.'['.$question->ID_SURVEI_PERTANYAAN.']');
					if(!is_null($upload_data)){
							$inputFileName = Yii::app()->basePath.'/../file/survei/'.$upload_data->getName();
							$upload_data->saveAs($inputFileName);
							$respon_detail->RESPON = json_encode(Yii::app()->baseUrl.'file/survei/'.$upload_data->getName());
						}
					}
					$respon_detail->ID_PERTANYAAN = $question->ID_SURVEI_PERTANYAAN;
					$respon_detail->ID_RESPON = $respon->ID_RESPON;
					$respon_detail->save();
				
				}
			}
			$this->redirect(Yii::app()->createUrl('surveyor/survei/detailsurvei/'.$id));
		}
		
		$this->render('input',array('model'=>$survei));
	}
	
	
	public function actionUpdate($id){
		
		$respon = Respon::model()->findByPk($id);
		$survei = $respon->iDRESPON;
	
		if(!empty($_POST)){

			
			foreach($survei->surveiForms as $used_form){
				foreach($used_form->surveiPertanyaans as $question){
					$respon_detail = ResponDetail::model()->findByAttributes(array('ID_PERTANYAAN'=>$question->ID_SURVEI_PERTANYAAN,'ID_RESPON'=>$respon->ID_RESPON,));
					if(is_null($respon_detail)){
						$respon_detail = new ResponDetail;
					}
					if($question->TYPE!=SurveiPertanyaan::UPLOAD){
						if(isset($_POST[$used_form->ID_SURVEI_FORM][$question->ID_SURVEI_PERTANYAAN])){
							$respon_detail->RESPON = json_encode($_POST[$used_form->ID_SURVEI_FORM][$question->ID_SURVEI_PERTANYAAN]);
						}
					}
					else{
					$upload_data = CUploadedFile::getInstanceByName($used_form->ID_SURVEI_FORM.'['.$question->ID_SURVEI_PERTANYAAN.']');
					if(!is_null($upload_data)){
							$inputFileName = Yii::app()->basePath.'/../file/survei/'.$upload_data->getName();
							$upload_data->saveAs($inputFileName);
							$respon_detail->RESPON = json_encode(Yii::app()->baseUrl.'file/survei/'.$upload_data->getName());
						}
					}
					$respon_detail->ID_PERTANYAAN = $question->ID_SURVEI_PERTANYAAN;
					$respon_detail->ID_RESPON = $respon->ID_RESPON;
					$respon_detail->save();
				
				}
			}
			$this->redirect(Yii::app()->createUrl('surveyor/survei/detailsurvei/'.$survei->ID_SURVEI));
		}
		
		$this->render('update',array('model'=>$survei,'respon'=>$respon,));
	}
	
	public function actionDetailSurvei($id){
		$this->layout = '//layouts/column1';
		$model = new Respon;
		$model->ID_SURVEI = $id;
		$model->NAMA = Yii::app()->user->name;
		$this->render('detail',array('model'=>$model));
	}
	
	public function actionViewSurvei($id){
		$respon = Respon::model()->findByPk($id);
		$survei = $respon->iDRESPON;
		$this->render('view',array('model'=>$survei,'respon'=>$respon,));
	}
}