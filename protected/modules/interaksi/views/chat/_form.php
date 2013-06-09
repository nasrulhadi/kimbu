<?php
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'chat-form',
    'htmlOptions' => array('class' => 'form-horizontal'),
    'enableAjaxValidation' => false,
        ));
?>

<fieldset>
    <?php echo $form->errorSummary($model); ?>
    
    <div class="control-group">
        <label for="Chat_NAMA" class="control-label">Nama Ruang Obrolan</label>
        <div class="controls">
            <?php echo $form->textField($model, 'NAMA', array('size' => 40, 'maxlength' => 20, 'class' => 'input-xlarge')); ?>
            <?php echo $form->error($model, 'NAMA'); ?>
        </div>
    </div>
    <div class="control-group">
        <label for="Chat_USER" class="control-label">Dengan User</label>
        <div class="controls">
           <?php echo $form->textField($model, 'NAMA', array('size' => 40, 'maxlength' => 40, 'class' => 'input-xlarge')); ?>
           <?php echo $form->error($model, 'NAMA'); ?>
        </div>
    </div>
</fieldset>
<div class="form-actions">
        <button class="btn btn-gebo" type="submit">Simpan dan Mulai Obrolan</button> 
        <?php echo CHtml::link('Batal dan Kembali', array('/interaksi/chat'), array('class' => 'btn')); ?>
</div>
<?php $this->endWidget(); ?>