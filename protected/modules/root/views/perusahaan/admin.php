<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle=Yii::app()->name . ' - Manajemen Perusahaan';

$this->breadcrumbs=array(
	'Dashboard'=>array('/'),
    'Manajemen Perusahaan',
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

<h3 class="heading">Manajemen Perusahaan</h3>

<div class="pull-left" style="margin-bottom: 20px;">
    <?php echo CHtml::link('<span class="icon-plus icon-white"></span> Buat Perusahaan', array('/root/perusahaan/create'), array('class' => 'btn btn-gebo')); ?>
    <?php echo CHtml::link('<span class="icon-search"></span> Pencarian','#',array('class'=>'btn search-button')); ?>
</div>
</br>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'perusahaan-grid',
	'dataProvider'=>$model->search(),
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'NAMA',
        'ALAMAT',
        'KOTA',
		'EMAIL',
        'TLP',
        'FAX',
        'KETERANGAN',
		array(
			'class'=>'MyCButtonColumn',
		),
	),
)); ?>
