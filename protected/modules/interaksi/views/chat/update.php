<?php
/* @var $this ChatController */
/* @var $model Chat */

$this->breadcrumbs=array(
	'Chats'=>array('index'),
	$model->ID_CHAT=>array('view','id'=>$model->ID_CHAT),
	'Update',
);

$this->menu=array(
	array('label'=>'List Chat', 'url'=>array('index')),
	array('label'=>'Create Chat', 'url'=>array('create')),
	array('label'=>'View Chat', 'url'=>array('view', 'id'=>$model->ID_CHAT)),
	array('label'=>'Manage Chat', 'url'=>array('admin')),
);
?>

<h1>Update Chat <?php echo $model->ID_CHAT; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>