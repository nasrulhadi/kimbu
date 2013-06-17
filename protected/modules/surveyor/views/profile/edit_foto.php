<div class="row-fluid">
    <div class="span5 center">
        <div align="center"><?php echo $model->displayPicture($model->FOTO);?></div>
        <small>Skala foto 3x4</small>
<!--        <div style="height: 250px; width: 100%; border: 1px solid #DDD;">
            <div align="center" style="margin-top: 120px;"><small>Skala foto 3x4</small></div>
        </div>-->
    </div>
    <div class="span7">
        <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'profile-form',
            'enableAjaxValidation'=>false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )); ?>
            <div class="row">
                <small>Ekstensi .jpeg, .jpg, .png</small><br>
                <?php echo $form->fileField($model,'FOTO',array('class'=>'uniform-file')); ?>
            </div>
            <div class="row buttons">
                <?php echo CHtml::submitButton('Unggah Foto',array('class'=>'btn btn-primary')); ?>
            </div>

        <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div>
</div>