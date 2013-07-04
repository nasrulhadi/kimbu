<?php
$this->pageTitle = Yii::app()->name . ' - Lihat Survei';

$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Survei' => array('/survei'),
    'Detail' => array('/survei/toko/detailsurvei/'.$model->ID_SURVEI),
    'Lihat'
);
?>

<h3 class="heading">Lihat Data Survei Toko & Penjualan</h3>
<?php echo @Yii::app()->user->getFlash('info'); ?>
<div class="row-fluid" style="margin-bottom: 20px;">
    <?php
    $tabs = array();
    foreach ($model->surveiForms as $form) {

        if ($form->iDSURVEIGRUP->POSITION == SurveiGrup::TOP) {
            $this->renderPartial('_view', array('model' => $form, 'respon' => $respon, 'intop' => true, 'survei' => $model));
        } else if ($form->iDSURVEIGRUP->POSITION == SurveiGrup::TAB) {
            $tabs[$form->NAMA] = $this->renderPartial('_view', array('model' => $form, 'respon' => $respon, 'intop' => false), true);
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
        if ($respon->APPROVAL == 0) {
            if(WebUser::isAdmin()){
                echo CHtml::link('<i class="icon-check icon-white" style="margin-top: 0px"></i> Disetujui', array('/survei/toko/approve/' . $respon->ID_RESPON), array('class' => 'btn btn-gebo btn-large'));
            }
        }
        echo "</div>";
        echo CHtml::link('<i class="icon-share-alt" style="margin-top: 0px" ></i> Kembali', Yii::app()->createUrl('/survei/toko/detailsurvei/' . $model->ID_SURVEI), array('class' => 'btn btn-large'));
        ?>
    </div>
</div>