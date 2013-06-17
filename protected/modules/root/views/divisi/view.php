<?php
/* @var $this DivisiController */
/* @var $model Divisi */

$this->pageTitle=Yii::app()->name . ' - Detil Divisi';

$this->breadcrumbs=array(
	'Dashboard'=>array('/'),
	'Manajemen Divisi'=>array('index'),
    $model->NAMA,
);
?>

<h3 class="heading">Detil Divisi | <?php echo $model->NAMA; ?></h3>
<?php echo @Yii::app()->user->getFlash('info');?>
<div class="row-fluid">
    <div class="span3">
        <h4>Logo Divisi</h4></br>
        <div class="profilethumb">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/file/logo/divisi/<?php echo $model->LOGO; ?>" class="cboxElement"><?php echo $model->displayPicture($model->LOGO);?></a>
        </div>
    </div>
    <div class="span9">
        <div class="w-box">
            <div class="w-box-header">
                Identitas Divisi
                <div class="pull-right">
                    <?php //echo CHtml::link('<span class="icon-plus"></span> Edit',array('perusahaan/update/'.$model->ID_DIVISI));?>
                    <div class="btn-group">
                        <a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">
                            <i class="icon-cog"></i> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><?php echo CHtml::link('<span class="icon-plus"></span> Edit',array('divisi/update/'.$model->ID_DIVISI));?></li>
                        </ul>
                    </div>
                </div>
            </div>
        <div class="w-box-content cnt_a">
            <?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'htmlOptions'=>array('class'=>'table table-striped'),
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
</div>

