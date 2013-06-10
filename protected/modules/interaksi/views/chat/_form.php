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
        <label for="Chat_NAMA" class="control-label">Nama Ruang</label>
        <div class="controls">
            <?php echo $form->textField($model, 'NAMA', array('size' => 40, 'maxlength' => 40, 'class' => 'input-xlarge')); ?>
            <?php echo $form->error($model, 'NAMA'); ?>
        </div>
    </div>
    <?php if($model->isNewRecord){ ?>
    <div class="control-group">
        <label for="Chat_DIBUAT_OLEH" class="control-label">User</label>
        <div class="controls">
           <?php echo $form->checkBoxList($model, 'DIBUAT_OLEH', User::getUserList(), array('template'=>'<label class="checkbox">{input}{label}</label>', 'separator'=>'')); ?>
           <?php echo $form->error($model, 'DIBUAT_OLEH'); ?>
        </div>
    </div>
    <?php } ?>
</fieldset>
<div class="form-actions">
    <button class="btn btn-gebo" type="submit">Simpan</button> 
        <?php echo CHtml::link('Kembali', array('/interaksi/chat'), array('class' => 'btn')); ?>
</div>
<?php $this->endWidget(); ?>