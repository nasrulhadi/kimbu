

<?php 
$this->breadcrumbs=array(
    'Dashboard'=>array('/'),
    'Survei Publik',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#surveipublik-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3 class="heading">Survei End User</h3>

<div class="pull-left" style="margin-bottom: 20px;">
    <?php echo CHtml::link('<span class="icon-search"></span> Pencarian','#',array('class'=>'btn search-button')); ?>
</div>
</br>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'surveipublik-grid',
	'dataProvider'=>$model->search(),
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		array(
        'header'=>'No.',
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),

		array(
			'class'=>'CLinkColumn',
			'header'=>'Nama Survei',
            'labelExpression'=>'$data->NAMA_SURVEI',
			'urlExpression'=>'Yii::app()->createUrl(\'surveyor/surveipublik/detailsurvei/\'.$data->ID_SURVEI)',
		),
		'KETERANGAN',
		'count',
		
	),


)); ?>
