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

	<div class="row">
		<?php echo $form->label($model,'ID_USER'); ?>
		<?php echo $form->textField($model,'ID_USER'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_DIVISI'); ?>
		<?php echo $form->textField($model,'ID_DIVISI'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USERNAME'); ?>
		<?php echo $form->textField($model,'USERNAME',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PASSWORD'); ?>
		<?php echo $form->passwordField($model,'PASSWORD',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAMA'); ?>
		<?php echo $form->textField($model,'NAMA',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMAIL'); ?>
		<?php echo $form->textField($model,'EMAIL',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TLP'); ?>
		<?php echo $form->textField($model,'TLP',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HP'); ?>
		<?php echo $form->textField($model,'HP',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FOTO'); ?>
		<?php echo $form->textField($model,'FOTO',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TYPE'); ?>
		<?php echo $form->textField($model,'TYPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TANGGAL_DIBUAT'); ?>
		<?php echo $form->textField($model,'TANGGAL_DIBUAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TERAKHIR_LOGIN'); ?>
		<?php echo $form->textField($model,'TERAKHIR_LOGIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->