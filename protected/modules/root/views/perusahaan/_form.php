<?php
/* @var $this PerusahaanController */
/* @var $model Perusahaan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'perusahaan-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data', 'class'=>'form-horizontal'),
)); ?>

	<p class="note">Isian dengan tanda <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NAMA'); ?>
		<?php echo $form->textField($model,'NAMA',array('size'=>45,'maxlength'=>255)); ?>
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
		<?php echo $form->labelEx($model,'FAX'); ?>
		<?php echo $form->textField($model,'FAX',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'FAX'); ?>
	</div>
    
    <?php if($model->isNewRecord) { ?>
	<div class="row">
		<?php echo $form->labelEx($model,'LOGO'); ?>
		<?php echo $form->fileField($model,'LOGO'); ?>
		<?php echo $form->error($model,'LOGO'); ?>
	</div><?php } ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ALAMAT'); ?>
		<?php echo $form->textArea($model,'ALAMAT',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ALAMAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'KOTA'); ?>
		<?php echo $form->textField($model,'KOTA',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'KOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'KETERANGAN'); ?>
		<?php echo $form->textArea($model,'KETERANGAN',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'KETERANGAN'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Simpan',array('class' => 'btn btn-gebo')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->