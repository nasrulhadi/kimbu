<?php
/* @var $this DivisiController */
/* @var $model Divisi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'divisi-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype'=>'multipart/form-data', 'class'=>'form-horizontal'),
)); ?>

	<p class="note">Isian dengan tanda <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NAMA'); ?>
		<?php echo $form->textField($model,'NAMA',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'NAMA'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'ID_PERUSAHAAN'); ?>
		<?php echo $form->dropDownList($model,'ID_PERUSAHAAN', Perusahaan::getAll(),array(
            //'class'=>'uniformselect',
            'prompt'=>'Pilih Perusahaan',
            'style'=>'width:250px;'
            )); ?>
		<?php echo $form->error($model,'ID_PERUSAHAAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'KETERANGAN'); ?>
		<?php echo $form->textArea($model,'KETERANGAN',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'KETERANGAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LOGO'); ?>
		<?php echo $form->fileField($model,'LOGO'); ?>
		<?php echo $form->error($model,'LOGO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Simpan',array('class'=>'btn btn-gebo')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->