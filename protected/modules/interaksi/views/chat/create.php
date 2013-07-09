<?php
$this->breadcrumbs=array(
    'Dashboard'=>array('/'),
    'Interaksi'=>array('/interaksi'),
    'Diskusi'=>array('/interaksi/chat'),
    'Buat Topik'
);

?>

<h3 class="heading">Buat Topik Diskusi</h3>
<?php if (Yii::app()->user->hasFlash('pesanSukses')){ ?>
    <div class="alert alert-success">
        <a class="close" data-dismiss="alert">×</a>
        <?php echo Yii::app()->user->getFlash('pesanSukses'); ?>
    </div>
<?php }elseif(Yii::app()->user->hasFlash('pesanError')){ ?>
    <div class="alert alert-error">
        <a class="close" data-dismiss="alert">×</a>
        <?php echo Yii::app()->user->getFlash('pesanError'); ?>
    </div>
<?php } ?>
<div class="row-fluid">
    <div class="span12">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>