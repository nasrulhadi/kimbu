<?php
$this->breadcrumbs=array(
    'Dashboard'=>array('/'),
    'Interaksi'=>array('/interaksi'),
    'Obrolan'=>array('/interaksi/chat'),
    'Buat Ruang Baru'
);

?>

<h3 class="heading">Buat Ruang Baru</h3>
<?php if (Yii::app()->user->hasFlash('pesanSukses')){ ?>
    <div class="alert alert-success">
        <a class="close" data-dismiss="alert">×</a>
        <?php echo Yii::app()->user->getFlash('pesanSukses'); ?>
    </div>
<?php } ?>
<div class="row-fluid">
    <div class="span12">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>