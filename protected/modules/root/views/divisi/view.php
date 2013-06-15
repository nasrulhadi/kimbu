<?php
/* @var $this DivisiController */
/* @var $model Divisi */

$this->pageTitle=Yii::app()->name . ' - Detil Divisi';

$this->breadcrumbs=array(
	'Dashboard'=>array('/'),
	'Manajemen Divisi'=>array('index'),
    'Detil Divisi'
);
?>

<h3 class="heading">Detil Divisi | <?php echo $model->NAMA; ?></h3>
<?php echo @Yii::app()->user->getFlash('info');?>
<div class="row-fluid">
    <div class="span3">
        <h4>Logo Divisi</h4></br>
        <div class="profilethumb">
            <?php echo $model->displayPicture($model->LOGO);?>
        </div>
    </div>
    <div class="span9">
        <h4>Identitas Divisi</h4></br>
        <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'htmlOptions'=>array('class'=>'table table-striped table-bordered'),
            'attributes'=>array(
                'ID_DIVISI',
                array(
                    'name'=>'ID_PERUSAHAAN',
                    'value'=>$model->Perusahaan->NAMA,
                ),
                'NAMA',
                'KETERANGAN',
            ),
        )); ?>
    </div>
</div>

