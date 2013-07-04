<div class="row-fluid">
    <div class="span5 center">
        <div align="center"><?php echo $model->displayPicture($model->LOGO);?></div>
        <small>Ukuran maks 500 KB</small>
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
                <?php echo $form->fileField($model,'LOGO',array('class'=>'uniform-file')); ?>
            </div>
            <div class="row buttons">
                <?php echo CHtml::submitButton('Unggah Foto',array('class'=>'btn btn-primary')); ?>
            </div>

        <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div>
</div>