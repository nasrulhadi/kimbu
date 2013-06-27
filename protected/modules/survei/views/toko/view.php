<?php
/* @var $this TokoController */
/* @var $model Survei */

$this->breadcrumbs=array(
	'Surveis'=>array('index'),
	$model->ID_SURVEI,
);

$this->menu=array(
	array('label'=>'List Survei', 'url'=>array('index')),
	array('label'=>'Create Survei', 'url'=>array('create')),
	array('label'=>'Update Survei', 'url'=>array('update', 'id'=>$model->ID_SURVEI)),
	array('label'=>'Delete Survei', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_SURVEI),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Survei', 'url'=>array('admin')),
);
?>

<h1>View Survei #<?php echo $model->ID_SURVEI; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_SURVEI',
		'NAMA_SURVEI',
		'STATUS',
		'KETERANGAN',
		'ID_DIVISI',
		'TYPE',
		'TANGGAL_DIBUAT',
	),
)); ?>
