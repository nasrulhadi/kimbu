<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle=Yii::app()->name . ' - Update User';

$this->breadcrumbs=array(
    'Dashboard'=>array('/'),
	'User Surveyor' => array('index'),
	'Update',
);
?>

<h3 class="heading">Update User Surveyor</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>