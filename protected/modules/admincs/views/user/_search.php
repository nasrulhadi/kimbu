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
    <div class="row-fluid">
        <div class="span12">
            <div class="row">
                <?php echo $form->label($model,'USERNAME'); ?>
                <?php echo $form->textField($model,'USERNAME',array('size'=>45,'maxlength'=>45)); ?>
            </div>

            <div class="row">
                <?php echo $form->label($model,'NAMA'); ?>
                <?php echo $form->textField($model,'NAMA',array('size'=>45,'maxlength'=>45)); ?>
            </div>

            <div class="row">
                <?php echo $form->label($model,'EMAIL'); ?>
                <?php echo $form->textField($model,'EMAIL',array('size'=>45,'maxlength'=>45)); ?>
            </div>

            <div class="row buttons">
                <?php echo CHtml::submitButton('Tampilkan Hasil', array('class' => 'btn btn-primary')); ?>
            </div>
        </div>
    </div>
	

<?php $this->endWidget(); ?>

</div><!-- search-form -->