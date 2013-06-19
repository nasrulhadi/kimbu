<?php 
$this->breadcrumbs=array(
    'Dashboard'=>array('/'),
    'Survei'=>array('/surveyor/survei/'),
    'Detail'
);
?>

<h3 class="heading">Detail Survei</h3>
<div class="pull-left" style="margin-bottom: 20px;">
   <table>
	   <tr>
			<td>Nama Survei :</td>
			<td><?php echo $model->iDRESPON->NAMA_SURVEI; ?></td>
			
	   </tr>
	   <tr>
			<td>Keterangan :</td>
			<td><?php echo $model->iDRESPON->KETERANGAN; ?></td>
	   </tr>
   </table>
</div>
</br>
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
			'header'=>'NAMA',
            'labelExpression'=>'$data->NAMA',
			'urlExpression'=>'',
		),
		array(
		'name'=>'TANGGAL_PENGISIAN',
		'value'=>'date(\'d-m-Y\',strtotime($data->TANGGAL_PENGISIAN))',
		),
		array(
			'name'=>'APROVAL',
			'value'=>'$data->APPROVAL==0?"Belum Disetujui":"Approved"',
		),
	),
	'htmlOptions'=>array(
		'class'=>''
	),
	'template'=>'{items}{summary}{pager}',

)); ?>

<div class="form-actions">
   <?php echo CHtml::link('Mulai Survei',Yii::app()->createUrl('surveyor/survei/input/'.$model->ID_SURVEI), array('class' => 'btn')); ?>
</div>