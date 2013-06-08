<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Dashboard'=>array('/'),
    'Manajemen User',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3 class="heading">Manajemen User</h3>

<div class="pull-left" style="margin-bottom: 20px;">
    <?php echo CHtml::link('<span class="icon-plus icon-white"></span> Buat User', array('/pengaturan/user/create'), array('class' => 'btn btn-primary')); ?>
    <?php echo CHtml::link('<span class="icon-search"></span> Pencarian','#',array('class'=>'btn search-button')); ?>
</div>
</br>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'NAMA',
        'DIVISI',
		'USERNAME',
		'PASSWORD',
		'EMAIL',
        'STATUS',
		/*
		'TLP',
		'HP',
		'FOTO',
		'TYPE',
		'TANGGAL_DIBUAT',
		'TERAKHIR_LOGIN',
		'STATUS',
		*/
		array(
			'class'=>'MyCButtonColumn',
		),
	),
)); ?>
