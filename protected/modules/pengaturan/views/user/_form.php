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

	<p class="note">Isian dengan tanda <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
		<?php echo $form->labelEx($model,'NAMA'); ?>
		<?php echo $form->textField($model,'NAMA',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'NAMA'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'USERNAME'); ?>
		<?php echo $form->textField($model,'USERNAME',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'USERNAME'); ?>
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

	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Buat User' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->