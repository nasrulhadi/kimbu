<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle=Yii::app()->name . ' - Update User';

$this->breadcrumbs=array(
    'Dashboard'=>array('/'),
	'Manajemen User'=>array('index'),
	$model->NAMA=>array('view','id'=>$model->ID_USER),
	'Update',
);
?>

<h3 class="heading">Update User | <?php echo $model->NAMA; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>