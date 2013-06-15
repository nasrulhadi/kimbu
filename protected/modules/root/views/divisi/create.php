<?php
/* @var $this DivisiController */
/* @var $model Divisi */

$this->pageTitle=Yii::app()->name . ' - Buat Divisi';

$this->breadcrumbs=array(
	'Dashboard'=>array('/'),
	'Manajemen Divisi'=>array('index'),
    'Buat Divisi Baru'
);
?>

<h3 class="heading">Buat Divisi</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>