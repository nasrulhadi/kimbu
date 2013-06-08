<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
    'Dashboard'=>array('/'),
	'Manajemen User'=>array('index'),
	$model->NAMA=>array('view','id'=>$model->ID_USER),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->ID_USER)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h3 class="heading">Update User | <?php echo $model->NAMA; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>