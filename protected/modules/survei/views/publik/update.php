<?php
$this->pageTitle = Yii::app()->name . ' - Update Survei';

$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Survei' => array('/survei/publik'),
    'Detail' => array('/survei/publik/detailsurvei/'.$model->ID_SURVEI),
    'Update'
);
?>

<h3 class="heading">Update Data Survei End User</h3>
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
            $this->renderPartial('_form', array('model' => $form, 'respon' => $respon, 'intop' => true, 'survei' => $model));
        } else if ($form->iDSURVEIGRUP->POSITION == SurveiGrup::TAB) {
            $tabs[$form->NAMA] = $this->renderPartial('_form', array('model' => $form, 'respon' => $respon, 'intop' => false), true);
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
        echo "<button class=\"btn btn-gebo btn-large\" type=\"submit\"><i class=\"icon-trash icon-white\" style=\"margin-top: 0px\"></i> Update Survei</button>";
        if ($respon->APPROVAL == 1) {
            if(WebUser::isAdmin()){
                echo " ";
                echo CHtml::link('<i class="icon-ban-circle icon-white" style="margin-top: 0px"></i> Batal Disetujui', array('/survei/publik/unapprove/' . $respon->ID_RESPON), array('class' => 'btn btn-danger btn-large'));
                echo " ";
                echo CHtml::link('<i class="icon-trash icon-white" style="margin-top: 0px"></i> Konfirmasi Hapus', array('/survei/publik/prehapus/' . $respon->ID_RESPON), array('class' => 'btn btn-inverse btn-large'));
            }
        }
        echo "</div>";
        echo CHtml::link('<i class="icon-share-alt" style="margin-top: 0px" ></i> Kembali', Yii::app()->createUrl('/survei/publik/detailsurvei/' . $model->ID_SURVEI), array('class' => 'btn btn-large'));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>