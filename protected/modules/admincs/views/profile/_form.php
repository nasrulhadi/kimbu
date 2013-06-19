<?php
/* @var $this ProfileController */
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
		<?php echo $form->labelEx($model,'USERNAME'); ?>
		<?php echo $form->textField($model,'USERNAME',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'USERNAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NAMA'); ?>
		<?php echo $form->textField($model,'NAMA',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'NAMA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TLP'); ?>
		<?php echo $form->textField($model,'TLP',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'TLP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMAIL'); ?>
		<?php echo $form->textField($model,'EMAIL',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'EMAIL'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Simpan Perubahan',array('class'=>'btn btn-danger')); ?>
        <?php echo CHtml::button('Batal',array('onclick'=>'history.go(-1)','class'=>'btn'));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->