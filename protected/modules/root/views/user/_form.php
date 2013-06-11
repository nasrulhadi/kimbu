<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
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
		<?php echo $form->labelEx($model,'ID_DIVISI'); ?>
		<?php echo $form->dropDownList($model,'ID_DIVISI', Divisi::getAll(),array(
            //'class'=>'uniformselect',
            'prompt'=>'Pilih Divisi',
            'style'=>'width:250px;'
            )); ?>
		<?php echo $form->error($model,'KODE_PERGURUAN_TINGGI'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'USERNAME'); ?>
		<?php echo $form->textField($model,'USERNAME',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'USERNAME'); ?>
	</div>
    
    <?php
    if($model->isNewRecord)
    {
    ?>
	<div class="row">
		<?php echo $form->labelEx($model,'PASSWORD'); ?>
		<?php echo $form->passwordField($model,'PASSWORD',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'PASSWORD'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'REPEAT'); ?>
		<?php echo $form->passwordField($model,'REPEAT',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'REPEAT'); ?>
	</div>
    <?php
    }
    ?>
    
    <div class="row">
		<?php echo $form->labelEx($model,'TYPE'); ?>
		<?php echo $form->dropDownList($model,'TYPE',$model->optionsRoles()); ?>
		<?php echo $form->error($model,'TYPE'); ?>
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
    
    <div class="row compactRadioGroup">
		<?php echo $form->labelEx($model,'STATUS'); ?><br>
		<?php echo $form->radioButtonList($model,'STATUS',array(User::STATUS_AKTIF=>'Aktif', User::STATUS_NON_AKTIF=>'Tidak Aktif'),array(
            'separator'=>'',
        )); ?>
		<?php echo $form->error($model,'STATUS'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'FOTO'); ?>
		<?php echo $form->fileField($model,'FOTO'); ?>
		<?php echo $form->error($model,'FOTO'); ?>
	</div>
    
	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Buat User' : 'Simpan Perubahan',array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->