<?php
/* @var $this PerusahaanController */
/* @var $model Perusahaan */

$this->pageTitle=Yii::app()->name . ' - Edit Perusahaan';

$this->breadcrumbs=array(
    'Dashboard'=>array('./'),
	'Manajemen Perusahaan'=>array('index'),
	$model->NAMA=>array('view','id'=>$model->ID_PERUSAHAAN),
	'Edit Perusahaan',
);
?>

<h3 class="heading">Edit Perusahaan | <?php echo $model->NAMA; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>