<?php
/* @var $this PerusahaanController */
/* @var $model Perusahaan */

$this->pageTitle=Yii::app()->name . ' - Buat Perusahaan';

$this->breadcrumbs=array(
    'Dashboard'=>'/',
	'Manajemen Perusahaan'=>array('index'),
	'Buat Perusahaan',
);
?>

<h3 class="heading">Buat Perusahaan</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>