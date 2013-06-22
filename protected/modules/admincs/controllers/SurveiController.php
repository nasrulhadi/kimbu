<?php

class SurveiController extends Controller
{
	public function actionIndex()
	{
		$this->layout = '//layouts/column1';
//		$model = new Survei;
        $type = 1;
		$model = Survei::model()->findByAttributes(array('TYPE'=>$type));
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
			$this->redirect(Yii::app()->createUrl('admincs/survei/detailsurvei/'.$id));
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
			$this->redirect(Yii::app()->createUrl('admincs/survei/detailsurvei/'.$survei->ID_SURVEI));
		}
		
		$this->render('update',array('model'=>$survei,'respon'=>$respon,));
	}
	
	public function actionDetailSurvei($id){
		$this->layout = '//layouts/column1';
		$model = new Respon;
		$model->ID_SURVEI = $id;
		
		$this->render('detail',array('model'=>$model));
	}
	
	public function actionViewSurvei($id){
		$respon = Respon::model()->findByPk($id);
		$survei = $respon->iDRESPON;
		$this->render('view',array('model'=>$survei,'respon'=>$respon,));
	}	
	
	public function actionApprove($id){
		$respon = Respon::model()->findByPk($id);
		$survei = $respon->iDRESPON;
		
//		if(!empty($_POST)){
//            //$model->setAttribute('STATUS_USER',User::ACTIVE);
//            $respon->setAttribute('APPROVAL', 1);
//            if($respon->save())
//            {
//                echo 'BERHASI!!';
//                $this->redirect(Yii::app()->createUrl('admincs/survei/detailsurvei/'.$survei->ID_SURVEI));
//		    }
//        }
        //if(!empty($_POST)){
            Respon::model()->updateByPk($id, array('APPROVAL'=>1));
            Yii::app()->user->setFlash('info',  MyFormatter::alertSuccess('<strong>Sukses!</strong> Proses approve telah berhasil dilakukan.'));
            $this->redirect(Yii::app()->createUrl('admincs/survei/detailsurvei/'.$survei->ID_SURVEI));
        //}
		$this->render('view',array('model'=>$survei,'respon'=>$respon,));
	}
    
    public function actionUnApprove($id){
		$respon = Respon::model()->findByPk($id);
		$survei = $respon->iDRESPON;
		
//		if(!empty($_POST)){
//		$respon->APPROVAL = 0;
//		$respon->save();
//		$this->redirect(Yii::app()->createUrl('admincs/survei/detailsurvei/'.$survei->ID_SURVEI));
//		}
        Respon::model()->updateByPk($id, array('APPROVAL'=>0));
            Yii::app()->user->setFlash('info',  MyFormatter::alertSuccess('<strong>Sukses!</strong> Proses pembatalan telah berhasil dilakukan.'));
            $this->redirect(Yii::app()->createUrl('admincs/survei/detailsurvei/'.$survei->ID_SURVEI));
		$this->render('view',array('model'=>$survei,'respon'=>$respon,));
	}
}