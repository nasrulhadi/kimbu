<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_DIVISI'); ?>
		<?php echo $form->textField($model,'ID_DIVISI'); ?>
		<?php echo $form->error($model,'ID_DIVISI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USERNAME'); ?>
		<?php echo $form->textField($model,'USERNAME',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'USERNAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PASSWORD'); ?>
		<?php echo $form->passwordField($model,'PASSWORD',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'PASSWORD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NAMA'); ?>
		<?php echo $form->textField($model,'NAMA',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'NAMA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMAIL'); ?>
		<?php echo $form->textField($model,'EMAIL',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'EMAIL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TLP'); ?>
		<?php echo $form->textField($model,'TLP',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'TLP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'HP'); ?>
		<?php echo $form->textField($model,'HP',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'HP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FOTO'); ?>
		<?php echo $form->textField($model,'FOTO',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'FOTO'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'TERAKHIR_LOGIN'); ?>
		<?php echo $form->textField($model,'TERAKHIR_LOGIN'); ?>
		<?php echo $form->error($model,'TERAKHIR_LOGIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
		<?php echo $form->error($model,'STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->