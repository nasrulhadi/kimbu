<?php
/* @var $this TokoController */
/* @var $model Survei */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_SURVEI'); ?>
		<?php echo $form->textField($model,'ID_SURVEI'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAMA_SURVEI'); ?>
		<?php echo $form->textField($model,'NAMA_SURVEI',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KETERANGAN'); ?>
		<?php echo $form->textField($model,'KETERANGAN',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_DIVISI'); ?>
		<?php echo $form->textField($model,'ID_DIVISI'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TYPE'); ?>
		<?php echo $form->textField($model,'TYPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TANGGAL_DIBUAT'); ?>
		<?php echo $form->textField($model,'TANGGAL_DIBUAT'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->