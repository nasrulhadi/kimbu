<?php
$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Survei' => array('/admincs/survei/'),
    'Input'
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
        <div class="w-box-header">Identitas Toko</div>
        <div class="w-box-content cnt_a">
            <div class="profilethumb">
                <?php
                $tabs = array();
                foreach ($model->surveiForms as $form) {

                    if ($form->iDSURVEIGRUP->POSITION == SurveiGrup::TOP) {
                        $this->renderPartial('_view', array('model' => $form, 'respon' => $respon,));
                    } else if ($form->iDSURVEIGRUP->POSITION == SurveiGrup::TAB) {
                        $tabs[$form->NAMA] = $this->renderPartial('_view', array('model' => $form, 'respon' => $respon,), true);
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
        <!-- <input type="hidden" name="approve" value="1">
        <button class="btn btn-gebo" type="submit">Approve</button> -->
        <?php
        if ($respon->APPROVAL == 0) {
            echo CHtml::link('<span class="icon-check icon-white"></span> Disetujui', array('survei/approve/' . $respon->ID_RESPON), array('class' => 'btn btn-gebo'));
        } else {
            echo CHtml::link('<span class="icon-ban-circle icon-white"></span> Batal Disetujui', array('survei/unapprove/' . $respon->ID_RESPON), array('class' => 'btn btn-danger'));
        }
        
        echo " ";
        echo CHtml::link('Kembali', Yii::app()->createUrl('admincs/survei/detailsurvei/' . $model->ID_SURVEI), array('class' => 'btn'));
        ?>
    </div>



    <?php $this->endWidget(); ?>

</div><!-- form -->