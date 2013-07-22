<?php

class ExcelController extends Controller
{
	public function actionIndex($id)
	{
		$survei = Survei::model()->findByPk($id);
        $render = false;

        if(WebUser::isAdmin() || WebUser::isClient()){
           $this->layout = '//layouts/blankLayout';
            header("Cache-Control: no-cache, no-store, must-revalidate");  
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=".$filename);
           $this->renderPartial('index',array('model'=>$survei));
        }else{
            Yii::app()->user->setFlash('info',  MyFormatter::alertWarning('<strong>Error!</strong> Anda tidak diperkenankan mengakses halaman tersebut.'));
            $this->redirect(array('/site/logout'));
        }
    }
        
    public function actionExport()
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'ID_SURVEI = 1';
        $criteria->order = 'ID_RESPON ASC';
        $model = Respon::model()->findAll($criteria);
        $filename='Data Survei Toko & Penjualan '.Yii::app()->params['tahun'];
        header("Cache-Control: no-cache, no-store, must-revalidate");  
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        
		$this->renderPartial('export_view',array(
            'model'=>$model,
		));
        exit();
    }
}