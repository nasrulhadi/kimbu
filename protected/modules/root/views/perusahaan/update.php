<?php
/* @var $this PerusahaanController */
/* @var $model Perusahaan */

$this->breadcrumbs=array(
    'Dashboard'=>'/',
	'Manajemen Perusahaan'=>array('index'),
	$model->NAMA=>array('view','id'=>$model->ID_PERUSAHAAN),
	'Update',
);
?>

<h3 class="heading">Update Perusahaan | <?php echo $model->NAMA; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>