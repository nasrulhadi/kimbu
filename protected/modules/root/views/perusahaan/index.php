<?php
/* @var $this PerusahaanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Perusahaans',
);

$this->menu=array(
	array('label'=>'Create Perusahaan', 'url'=>array('create')),
	array('label'=>'Manage Perusahaan', 'url'=>array('admin')),
);
?>

<h1>Perusahaans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
