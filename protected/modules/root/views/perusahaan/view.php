<?php
/* @var $this PerusahaanController */
/* @var $model Perusahaan */

$this->pageTitle=Yii::app()->name . ' - Detil Perusahaan';

$this->breadcrumbs=array(
    'Dashboard'=>'/',
	'Manajemen Perusahaan'=>array('index'),
	'Detil Perusahaan',
);
?>

<h3 class="heading">Detil Perusahaan | <?php echo $model->NAMA; ?></h3>
<?php echo @Yii::app()->user->getFlash('info');?>
<div class="row-fluid">
    <div class="span3">
        <h4>Logo Perusahaan</h4></br>
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/file/logo/perusahaan/<?php echo $model->LOGO; ?>" class="cboxElement"><?php echo $model->displayPicture($model->LOGO);?></a>
    </div>
    <div class="span9">
        <div class="w-box">
            <div class="w-box-header">
                Identitas Perusahaan
                <div class="pull-right">
                    <?php //echo CHtml::link('Edit Profile',array('perusahaan/update/'.$model->ID_PERUSAHAAN));?>
                    <div class="btn-group">
                        <a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">
                            <i class="icon-cog"></i> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><?php echo CHtml::link('<span class="icon-plus"></span> Edit',array('perusahaan/update/'.$model->ID_PERUSAHAAN));?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-box-content cnt_a">
                
            <?php $this->widget('zii.widgets.CDetailView', array(
                'htmlOptions'=>array('class'=>'table table-striped'),
                'data'=>$model,
                'attributes'=>array(
                    'NAMA',
                    'EMAIL',
                    'TLP',
                    'FAX',
                    'ALAMAT',
                    'KOTA',
                    'KETERANGAN',
                    array(
                        'name'=>'TERAKHIR_UPDATE',
                        'type'=>'dateFormat',
                        'value'=>$model->TERAKHIR_UPDATE,
                    ),
                ),
            )); ?>
            </div>
    </div>
</div>

