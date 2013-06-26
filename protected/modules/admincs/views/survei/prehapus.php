<?php
$this->pageTitle = Yii::app()->name ." Konfirmasi Hapus";

$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Survei' => array('/admincs/survei/'),
    'Hapus'
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
        <div class="w-box-header">Detail Survei</div>
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
                        $this->renderPartial('_prehapus', array('model' => $form, 'respon' => $respon,));
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <?php
        echo CHtml::link('<span class="icon-trash icon-white"></span> Hapus Survei', array('survei/hapus/' . $respon->ID_RESPON), array('class' => 'btn btn-inverse'));
        echo " ";
        echo CHtml::link('Kembali', Yii::app()->createUrl('admincs/survei/update/' . $respon->ID_RESPON), array('class' => 'btn'));
        ?>
    </div>



    <?php $this->endWidget(); ?>

</div><!-- form -->