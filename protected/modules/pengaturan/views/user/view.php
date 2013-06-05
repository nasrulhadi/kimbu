<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->ID_USER,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->ID_USER)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_USER),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->ID_USER; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_USER',
		'ID_DIVISI',
		'USERNAME',
		'PASSWORD',
		'NAMA',
		'EMAIL',
		'TLP',
		'HP',
		'FOTO',
		'TYPE',
		'TANGGAL_DIBUAT',
		'TERAKHIR_LOGIN',
		'STATUS',
	),
)); ?>
