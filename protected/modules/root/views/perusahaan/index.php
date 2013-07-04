<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = Yii::app()->name . ' - Manajemen Perusahaan';

$this->breadcrumbs=array(
	'Dashboard'=>array('/'),
    'Manajemen Perusahaan',
);

?>

<h3 class="heading">Manajemen Perusahaan</h3>
<?php echo @Yii::app()->user->getFlash('info'); ?>
<div class="pull-left" style="margin-bottom: 20px;">
    <?php echo CHtml::link('<span class="icon-plus icon-white"></span> Tambah Perusahaan', array('/root/perusahaan/create'), array('class' => 'btn btn-gebo')); ?>
</div>
<div class="row-fluid">
    <div class="span12">
        
        <div class="clearfix"></div>
        <table class="table table-bordered table-striped table_vam" id="perusahaanGrid">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Perusahaan</th>
                    <th>Logo</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Kota</th>
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
