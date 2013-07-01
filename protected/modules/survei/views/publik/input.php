<?php
$this->pageTitle = Yii::app()->name . ' - Input Survei';

$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Survei' => array('/survei/publik'),
    'Detail' => array('/survei/publik/detailsurvei/'.$model->ID_SURVEI),
    'Input'
);
?>

<h3 class="heading">Input Data Survei End User</h3>
<?php echo @Yii::app()->user->getFlash('info'); ?>
<div class="row-fluid" style="margin-bottom: 20px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'survei-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    
    $tabs = array();
    foreach ($model->surveiForms as $form) {

        if ($form->iDSURVEIGRUP->POSITION == SurveiGrup::TOP) {
            $this->renderPartial('_form', array('model' => $form, 'intop' => true, 'survei' => $model));
        } else if ($form->iDSURVEIGRUP->POSITION == SurveiGrup::TAB) {
            $tabs[$form->NAMA] = $this->renderPartial('_form', array('model' => $form, 'intop' => false), true);
        }
    }

    $this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs' => $tabs,
        'htmlOptions' => array('class' => 'tabbable tabbable-bordered'),
        'options' => array(
            'collapsible' => true,
        )
    ));
    ?>
    <div class="form-actions">
        <div class="pull-right">
        <?php
        echo "<button class=\"btn btn-gebo btn-large\" type=\"submit\"><i class=\"icon-trash icon-white\" style=\"margin-top: 0px\"></i> Simpan Survei</button>";
        echo "</div>";
        echo CHtml::link('<i class="icon-share-alt" style="margin-top: 0px" ></i> Kembali', Yii::app()->createUrl('/survei/publik/detailsurvei/' . $model->ID_SURVEI), array('class' => 'btn btn-large'));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>