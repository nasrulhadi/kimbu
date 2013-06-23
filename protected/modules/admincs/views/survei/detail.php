<?php
$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Survei' => array('/admincs/survei/'),
    'Detail'
);
?>

<h3 class="heading">Detail Survei</h3>
<?php echo @Yii::app()->user->getFlash('info'); ?>
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
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'user-grid',
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
            'urlExpression' => '$data->APPROVAL==0?"/admincs/survei/ViewSurvei/$data->ID_RESPON":"/admincs/survei/update/$data->ID_RESPON"',
        ),
        array(
            'name' => 'SURVEYOR',
            'value' => '$data->iDUSER->NAMA',
        ),
//		array(
//		'name'=>'TANGGAL_PENGISIAN',
//		'value'=>'date(\'d-m-Y\',strtotime($data->TANGGAL_PENGISIAN))',
//		),
        array(
            'name' => 'TANGGAL_PENGISIAN',
            'type' => 'dateTimeFormat',
            'value' => '$data->TANGGAL_PENGISIAN',
        ),
        array(
            'name' => 'APPROVAL',
            'type'=>'raw',
            'value' => '$data->APPROVAL==0?"<span class=\"label label-warning\">Belum Disetujui</span>":"<span class=\"label label-success\">Disetujui</span>"',
        ),
    ),
    'htmlOptions' => array(
        'class' => ''
    ),
    'template' => '{items}{summary}{pager}',
));
?>