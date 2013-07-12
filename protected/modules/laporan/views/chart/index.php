<?php
$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Chart',
);

$dataProvider = new CActiveDataProvider('Survei', array(
    'criteria' => array(
        'condition' => 'STATUS = :status AND ID_DIVISI = :divisi',
        'params' => array(':status' => 1, ':divisi' => Yii::app()->user->idDivisi),
    ),
    'pagination' => false,
        ));

$getListMsg = $dataProvider->getData();
?>

<h3 class="heading">Grafik Survei</h3>
</br>
<div class="row-fluid">
    <div class="span12">
        <table class="table table-bordered table-striped table_vam" id="surveiIndex">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Survei</th>
                    <th>Keterangan</th>
                    <th>Divisi</th>
                    <th>Model</th>
                    <th>Total Survei</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProvider,
                    'itemView' => '_index',
                    'template' => '{items}',
                ));
                ?>
            </tbody>
        </table>
    </div>
</div>
