<?php
/* @var $this ChatController */
/* @var $model Chat */

$this->breadcrumbs=array(
	'Chats'=>array('index'),
	$model->ID_CHAT,
);

$this->menu=array(
	array('label'=>'List Chat', 'url'=>array('index')),
	array('label'=>'Create Chat', 'url'=>array('create')),
	array('label'=>'Update Chat', 'url'=>array('update', 'id'=>$model->ID_CHAT)),
	array('label'=>'Delete Chat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_CHAT),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Chat', 'url'=>array('admin')),
);
?>

<h1>View Chat #<?php echo $model->ID_CHAT; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_CHAT',
		'NAMA',
		'DIBUAT_OLEH',
		'DIBUAT_TANGGAL',
		'TERAKHIR_UPDATE',
		'STATUS',
	),
)); ?>
