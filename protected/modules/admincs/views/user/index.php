<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = Yii::app()->name . ' - Manajemen User';

$this->breadcrumbs=array(
	'Dashboard'=>array('/'),
    'Users',
);

?>

<h3 class="heading">Pengaturan User</h3>
<?php echo @Yii::app()->user->getFlash('info'); ?>
<div class="pull-left" style="margin-bottom: 20px;">
    <?php echo CHtml::link('<span class="icon-plus icon-white"></span> Buat User', array('/admincs/user/create'), array('class' => 'btn btn-gebo')); ?>
</div>
<div class="row-fluid">
    <div class="span12">
        
        <div class="clearfix"></div>
        <table class="table table-bordered table-striped table_vam" id="userGrid">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No. Telpon</th>
                    <th>Terakhir Login</th>
                    <th>Status</th>
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
