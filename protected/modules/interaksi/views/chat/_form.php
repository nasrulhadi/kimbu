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
        <label for="Chat_NAMA" class="control-label">Nama Topik</label>
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
    <?php 
    if($model->isNewRecord){ 
        echo CHtml::link('<i class="icon-share-alt" style="margin-top: 0px" ></i> Kembali', array('/interaksi/chat'), array('class' => 'btn btn-large'));
    } else {
        echo CHtml::link('<i class="icon-share-alt" style="margin-top: 0px" ></i> Kembali', array('/interaksi/chat/view/'.$model->ID_CHAT), array('class' => 'btn btn-large'));
    }
    ?>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <button class="btn btn-gebo btn-large" type="submit"><i class="icon-trash icon-white" style="margin-top: 0px"></i> Simpan</button>
</div>
<?php $this->endWidget(); ?>