

<?php 
$this->breadcrumbs=array(
    'Dashboard'=>array('/'),
    'Survei',
);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		array(
        'header'=>'No.',
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		array(
			'class'=>'CLinkColumn',
			'header'=>'NAMA_SURVEI',
            'labelExpression'=>'$data->NAMA_SURVEI',
			'urlExpression'=>'Yii::app()->createUrl(\'admincs/survei/detailsurvei/\'.$data->ID_SURVEI)',
		),
		'KETERANGAN',
		'countAll',
		'countNotApproved',
		array(
		'name'=>'STATUS',
		'value'=>'$data->STATUS==0?"Tidak Aktif":"Aktif"',
		),
		
	),
	'htmlOptions'=>array(
		'class'=>''
	),


)); ?>
