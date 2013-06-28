<?php
$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Survei',
);

$dataProvider = new CActiveDataProvider('Survei', array(
            'criteria' => array(
                'condition' => 'TYPE = :type AND ID_DIVISI = :divisi',
                'params' => array(':type' => 1, ':divisi' => Yii::app()->user->idDivisi),
            ),
            'pagination' => false,
        ));

$getListMsg = $dataProvider->getData();
?>

<h3 class="heading">Survei Toko & Penjualan</h3>
</br>
<div class="row-fluid">
    <div class="span12">
        <table class="table table-bordered table-striped table_vam" id="surveiIndex">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Survei</th>
                    <th>Keterangan</th>
                    <?php if(!WebUser::isClient()) { ?>
                    <th>Survei Disetujui</th>
                    <th>Survei Belum Disetujui</th>
                    <th>Semua Survei</th>
                    <?php } else { ?>
                    <th>Divisi</th>
                    <th>Model</th>
                    <th>Total Survei</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                    'template' => '{items}',
                ));
                ?>
            </tbody>
        </table>
    </div>
</div>