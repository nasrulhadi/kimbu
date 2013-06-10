<?php
$this->breadcrumbs=array(
    'Dashboard'=>array('/'),
    'Interaksi'=>array('/interaksi/chat'),
    'Obrolan'
);

?>

<h3 class="heading">Obrolan</h3>
<?php if (Yii::app()->user->hasFlash('pesanSukses')){ ?>
    <div class="alert alert-success">
        <a class="close" data-dismiss="alert">×</a>
        <?php echo Yii::app()->user->getFlash('pesanSukses'); ?>
    </div>
<?php } ?>
<div class="row-fluid">
    <div class="span12">
        <div class="pull-right" style="margin-bottom: 20px;">
            <?php echo CHtml::link('Buat Obrolan', array('/interaksi/chat/create'), array('class' => 'btn btn-warning')); ?>
        </div>
        <div class="clearfix""></div>
        <table class="table table-bordered table-striped table_vam" id="user">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Ruang</th>
                    <th>Jumlah User</th>
                    <th>Obrolan Terakhir</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                    'template' => '{items}',
                    'emptyText' => '<tr><td colspan="6" style="text-align:center"><em>Data tidak ditemukan</em></td></tr>',
                ));
                ?>
            </tbody>
        </table>
    </div>
</div>
