<?php
/* @var $this PerusahaanController */
/* @var $model Perusahaan */

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
        <div class="profilethumb">
            <?php echo $model->displayPicture($model->LOGO);?>
        </div>
    </div>
    <div class="span9">
        <h4>Identitas Perusahaan</h4></br>
            <?php $this->widget('zii.widgets.CDetailView', array(
                'htmlOptions'=>array('class'=>'table table-striped table-bordered'),
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

