<?php
$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Survei' => array('/client/survei/'),
    'Detail'
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#survei-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3 class="heading">Detail Survei</h3>

<div class="pull-left" style="margin-bottom: 20px;">
    <table>
        <tr>
            <td>Nama Survei </td>
            <td>: <strong><?php echo $model->iDRESPON->NAMA_SURVEI; ?></strong></td>
        </tr>
        <tr>
            <td>Keterangan </td>
            <td>: <strong><?php echo $model->iDRESPON->KETERANGAN; ?></strong></td>
        </tr>
    </table>
</div>
</br>
<!--<div class="pull-right" style="margin-bottom: 20px;">
    <?php echo CHtml::link('<span class="icon-search"></span> Pencarian','#',array('class'=>'btn search-button')); ?>
</div>-->
</br>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchSurvei',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'survei-grid',
    'dataProvider' => $model->search(),
    'itemsCssClass' => 'table table-striped table-bordered table-hover',
    'columns' => array(
        array(
            'header' => 'No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
        array(
            'class' => 'CLinkColumn',
            'header' => 'NAMA',
            'labelExpression' => '$data->NAMA',
            'urlExpression' => 'Yii::app()->createUrl(\'client/survei/ViewSurvei/\'.$data->ID_RESPON)',
        ),
//		array(
//		'name'=>'TANGGAL_PENGISIAN',
//		'value'=>'date(\'d-m-Y\',strtotime($data->TANGGAL_PENGISIAN))',
//		),
        array(
            'header' => 'Surveyor',
            'value' => '$data->iDUSER->NAMA',
        ),
        array(
            'name' => 'TANGGAL_PENGISIAN',
            'type' => 'dateTimeFormat',
            'value' => '$data->TANGGAL_PENGISIAN',
        ),
    ),
    'htmlOptions' => array(
        'class' => ''
    ),
    'template' => '{items}{summary}{pager}',
));
?>
