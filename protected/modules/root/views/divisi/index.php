<?php
/* @var $this DivisiController */
/* @var $model Divisi */

$this->pageTitle=Yii::app()->name . ' - Manajemen Divisi';

$this->breadcrumbs=array(
	'Dashboard'=>array('/'),
	'Manajemen Divisi',
);
?>

<h3 class="heading">Manajemen Divisi</h3>
<?php echo @Yii::app()->user->getFlash('info'); ?>
<div class="row-fluid">
    <div class="span12">
        <div class="pull-left" style="margin-bottom: 20px;">
            <?php echo CHtml::link('<span class="icon-plus icon-white"></span> Tambah Divisi', array('/root/divisi/create'), array('class' => 'btn btn-gebo')); ?>
        </div>
        <div class="clearfix"></div>
        <table class="table table-bordered table-striped table_vam" id="divisiGrid">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Divisi</th>
                    <th>Logo</th>
                    <th>Keterangan</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                    'template' => '{items}',
                ));
                ?>
            </tbody>
        </table>
    </div>
</div>
