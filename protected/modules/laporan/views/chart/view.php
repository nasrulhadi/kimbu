<?php
$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Grafik' => array('/laporan/chart'),
    'Lihat'
);
?>

<h3 class="heading">Lihat Grafik Survei</h3>

<?php
$dataProvider = new CActiveDataProvider('Grafik', array(
    'criteria' => array(
        'condition' => "ID_SURVEI = :idSurvei ",
        'params' => array("idSurvei" => $idsurvei),
        'order' => 'ID_GRAFIK ASC',
    ),
    'pagination' => false,
        ));

$getListMsg = $dataProvider->getData();

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'template' => '{items}',
    'emptyText' => '',
));
?>

<div class="form-actions">
        <div class="pull-left">
        <?php
            echo CHtml::link('<i class="icon-share-alt" style="margin-top: 0px" ></i> Kembali', Yii::app()->createUrl('/laporan/chart'), array('class' => 'btn btn-large'));
        ?>
    </div>
</div>