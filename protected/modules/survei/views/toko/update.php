<?php
/* @var $this TokoController */
/* @var $model Survei */

$this->breadcrumbs=array(
	'Surveis'=>array('index'),
	$model->ID_SURVEI=>array('view','id'=>$model->ID_SURVEI),
	'Update',
);

$this->menu=array(
	array('label'=>'List Survei', 'url'=>array('index')),
	array('label'=>'Create Survei', 'url'=>array('create')),
	array('label'=>'View Survei', 'url'=>array('view', 'id'=>$model->ID_SURVEI)),
	array('label'=>'Manage Survei', 'url'=>array('admin')),
);
?>

<h1>Update Survei <?php echo $model->ID_SURVEI; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>