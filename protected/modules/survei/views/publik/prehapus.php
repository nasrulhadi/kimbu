<?php
$this->pageTitle = Yii::app()->name . ' - Konfirmasi Hapus';

$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Survei' => array('/survei/publik'),
    'Detail' => array('/survei/publik/detailsurvei/'.$model->ID_SURVEI),
    'Hapus'
);
?>

<h3 class="heading">Konfirmasi Hapus Data Survei End User</h3>
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
            $this->renderPartial('_prehapus', array('model' => $form, 'respon' => $respon, 'intop' => true, 'survei' => $model));
        }
    }
    ?>
    <div class="form-actions">
        <div class="pull-right">
        <?php
        if(WebUser::isAdmin() && $respon->APPROVAL == 1){
            echo CHtml::link('<i class="icon-check icon-white" style="margin-top: 0px"></i> Hapus Survei', array('/survei/publik/hapus/' . $respon->ID_RESPON), array('class' => 'btn btn-inverse btn-large'));
        }
        echo "</div>";
        echo CHtml::link('<i class="icon-share-alt" style="margin-top: 0px" ></i> Kembali', Yii::app()->createUrl('/survei/publik/update/' . $respon->ID_RESPON), array('class' => 'btn btn-large'));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>