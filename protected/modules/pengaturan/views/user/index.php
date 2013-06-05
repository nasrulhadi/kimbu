<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dashboard'=>array('/'),
    'Users',
);

?>

<h3 class="heading">Pengaturan User</h3>
<div class="row-fluid">
    <div class="span12">
        <div class="pull-right" style="margin-bottom: 20px;">
            <?php echo CHtml::link('Buat Pegawai', array('/pengaturan/pegawai/create'), array('class' => 'btn btn-warning')); ?>
        </div>
        <div class="clearfix""></div>
        <table class="table table-bordered table-striped table_vam" id="user">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No. Telpon</th>
                    <th>Username</th>
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
