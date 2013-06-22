<?php
$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Survei' => array('/surveyor/surveipublik/'),
    'Detail' => array('/surveyor/surveipublik/detailsurvei/'.$model->ID_SURVEI),
    'Update'
);
?>

<div class="row-fluid">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'survei-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <div class="w-box">
        <div class="w-box-header">Survei</div>
        <div class="w-box-content cnt_a">
            <div class="profilethumb">
                <table>
                    <tr>
                        <td>Nama Survei </td>
                        <td>: <strong><?php echo $model->NAMA_SURVEI; ?></strong></td>
                    </tr>
                    <tr>
                        <td>Keterangan </td>
                        <td>: <strong><?php echo $model->KETERANGAN; ?></strong></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="w-box">
        <div class="w-box-header">Identitas End User</div>
        <div class="w-box-content cnt_a">
            <div class="profilethumb">
                <?php
                $tabs = array();
                foreach ($model->surveiForms as $form) {

                    if ($form->iDSURVEIGRUP->POSITION == SurveiGrup::TOP) {
                        $this->renderPartial('_form', array('model' => $form, 'respon' => $respon,));
                    } else if ($form->iDSURVEIGRUP->POSITION == SurveiGrup::TAB) {
                        $tabs[$form->NAMA] = $this->renderPartial('_form', array('model' => $form, 'respon' => $respon,), true);
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="profilethumb" style="margin-top: 20px">
        <?php
        $this->widget('zii.widgets.jui.CJuiTabs', array(
            'tabs' => $tabs,
            // additional javascript options for the tabs plugin
            'options' => array(
                'collapsible' => true,
            ),
        ));
        ?>
    </div>
    <div class="form-actions">
        <button class="btn btn-gebo" type="submit">Simpan</button> 
        <?php echo CHtml::link('Kembali', Yii::app()->createUrl('surveyor/surveipublik/detailsurvei/' . $model->ID_SURVEI), array('class' => 'btn')); ?>
    </div>



    <?php $this->endWidget(); ?>

</div><!-- form -->