<?php
/* @var $this DivisiController */
/* @var $model Divisi */

$this->pageTitle=Yii::app()->name . ' - Tambah Divisi';

$this->breadcrumbs=array(
	'Dashboard'=>array('/'),
	'Manajemen Divisi'=>array('index'),
    'Tambah Divisi'
);
?>

<h3 class="heading">Tambah Divisi</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>