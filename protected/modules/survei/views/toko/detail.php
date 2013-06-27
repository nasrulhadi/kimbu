<?php
$this->pageTitle=Yii::app()->name . ' - Detil Survei';

$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Survei' => array('/surveyor/survei/'),
    'Detail'
);

$dataProvider = new CActiveDataProvider('Respon', array(
            'criteria' => array(
                'condition' => 'ID_SURVEI = :idSurvei AND APPROVAL <> 2',
                'params' => array(':idSurvei' => $model->ID_SURVEI),
                'order' => 'ID_RESPON DESC',
            ),
            'pagination' => false,
        ));

$getListMsg = $dataProvider->getData();
?>

<h3 class="heading">Detail Survei</h3>

<div class="pull-left" style="margin-bottom: 20px;">
    <?php echo CHtml::link('Mulai Survei', Yii::app()->createUrl('surveyor/survei/input/' . $model->ID_SURVEI), array('class' => 'btn btn-success')); ?>
</div>
<div class="clearfix"></div>


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
<div class="row-fluid">
    <div class="span12">
        <table class="table table-bordered table-striped table_vam" id="surveiDetail">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Toko</th>
                    <th>Surveyor</th>
                    <th>Tanggal Pengisian</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProvider,
                    'itemView' => '_detail',
                    'template' => '{items}',
                    'emptyText' => '',
                ));
                ?>
            </tbody>
        </table>
    </div>
</div>

