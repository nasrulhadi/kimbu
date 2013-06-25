<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route.'/'.$model->ID_SURVEI),
	'method'=>'get',
)); ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="row">
                <?php echo $form->label($model,'NAMA'); ?>
                <?php echo $form->textField($model,'NAMA'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model,'APPROVAL'); ?><br>
                <?php echo $form->dropDownList($model,'APPROVAL',array(Respon::DISETUJUI=>'Disetujui', Respon::BELUM_DISETUJUI=>'Belum Disetujui')); ?>
            </div>

            <div class="row buttons">
                <?php echo CHtml::submitButton('Tampilkan Hasil', array('class' => 'btn btn-danger')); ?>
            </div>
        </div>
    </div>
	

<?php $this->endWidget(); ?>

</div><!-- search-form -->