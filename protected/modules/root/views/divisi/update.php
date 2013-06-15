<?php
/* @var $this DivisiController */
/* @var $model Divisi */

$this->breadcrumbs=array(
	'Divisis'=>array('index'),
	$model->ID_DIVISI=>array('view','id'=>$model->ID_DIVISI),
	'Update',
);

$this->menu=array(
	array('label'=>'List Divisi', 'url'=>array('index')),
	array('label'=>'Create Divisi', 'url'=>array('create')),
	array('label'=>'View Divisi', 'url'=>array('view', 'id'=>$model->ID_DIVISI)),
	array('label'=>'Manage Divisi', 'url'=>array('admin')),
);
?>

<h1>Update Divisi <?php echo $model->ID_DIVISI; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>