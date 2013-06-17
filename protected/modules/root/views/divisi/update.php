<?php
/* @var $this DivisiController */
/* @var $model Divisi */

$this->pageTitle=Yii::app()->name . ' - Edit Divisi';

$this->breadcrumbs=array(
    'Dashboard'=>array('./'),
	'Manajemen Divisi'=>array('index'),
	$model->NAMA=>array('view','id'=>$model->ID_DIVISI),
	'Edit Divisi',
);
?>

<h3 class="heading">Edit Divisi | <?php echo $model->NAMA; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>