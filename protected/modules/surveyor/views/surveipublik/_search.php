<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="row">
                <?php echo $form->label($model,'NAMA_SURVEI'); ?>
                <?php echo $form->textField($model,'NAMA_SURVEI'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model,'STATUS'); ?><br>
                <?php echo $form->dropDownList($model,'STATUS',array(User::STATUS_AKTIF=>'Aktif', User::STATUS_NON_AKTIF=>'Tidak Aktif')); ?>
            </div>

            <div class="row buttons">
                <?php echo CHtml::submitButton('Tampilkan Hasil', array('class' => 'btn btn-warning')); ?>
            </div>
        </div>
    </div>
	

<?php $this->endWidget(); ?>

</div><!-- search-form -->