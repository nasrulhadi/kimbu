<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle=Yii::app()->name . ' - Buat User';

$this->breadcrumbs=array(
    'Dashboard'=>array('/'),
	'Manajemen User'=>array('index'),
	'Buat User',
);
?>

<h3 class="heading">Buat User Baru</h3>
<div class="row-fluid">
    <div class="span12">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>
