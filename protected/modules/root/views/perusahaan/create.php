<?php
/* @var $this PerusahaanController */
/* @var $model Perusahaan */

$this->pageTitle=Yii::app()->name . ' - Buat Perusahaan';

$this->breadcrumbs=array(
    'Dashboard'=>'/',
	'Manajemen Perusahaan'=>array('index'),
	'Tambah Perusahaan',
);
?>

<h3 class="heading">Tambah Perusahaan</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>