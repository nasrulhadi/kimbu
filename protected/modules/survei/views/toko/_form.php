<?php
/* @var $this TokoController */
/* @var $model Survei */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survei-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NAMA_SURVEI'); ?>
		<?php echo $form->textField($model,'NAMA_SURVEI',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'NAMA_SURVEI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
		<?php echo $form->error($model,'STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'KETERANGAN'); ?>
		<?php echo $form->textField($model,'KETERANGAN',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'KETERANGAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_DIVISI'); ?>
		<?php echo $form->textField($model,'ID_DIVISI'); ?>
		<?php echo $form->error($model,'ID_DIVISI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TYPE'); ?>
		<?php echo $form->textField($model,'TYPE'); ?>
		<?php echo $form->error($model,'TYPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TANGGAL_DIBUAT'); ?>
		<?php echo $form->textField($model,'TANGGAL_DIBUAT'); ?>
		<?php echo $form->error($model,'TANGGAL_DIBUAT'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->