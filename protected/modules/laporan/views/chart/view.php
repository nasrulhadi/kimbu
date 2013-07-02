<?php
$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Grafik' => array('/laporan/chart'),
    'Lihat'
);
?>

<h3 class="heading">Lihat Grafik Survei Toko & Penjualan</h3>

<div class="row-fluid" style="margin-top: 40px;">
    <div class="span8">
        <?php
        $data = array();
        $x_axis = array();
        $list_user = User::model()->findAllByAttributes(array(), $condition = 'TYPE = 3 AND ID_USER <> 2');
        $id_pertanyaan = 8;
        $type = 3;
        $approval = 1;
        foreach ($list_user as $user) {
            $x_axis[] = $user->NAMA;
            $id_user = $user->ID_USER;

            $criteria = new CDbCriteria;
            $respon = '%1%';
            $criteria->join = 'JOIN respon ON respon.ID_USER = t.ID_USER JOIN respon_detail ON respon.ID_RESPON = respon_detail.ID_RESPON';
            $criteria->condition = 'ID_PERTANYAAN = :id_pertanyaan AND RESPON LIKE :respon AND TYPE = :type AND APPROVAL = :approval AND t.ID_USER = :id_user';
            $criteria->params = array('id_pertanyaan' => $id_pertanyaan, 'respon' => $respon, 'type' => $type, 'approval' => $approval, 'id_user' => $id_user,);
            $criteria->select = 'COUNT(*) as COUNT';

            $count = User::model()->find($criteria)->COUNT;
            $data['lama'][] = (int) $count;

            $criteria = new CDbCriteria;
            $respon = '%2%';
            $criteria->join = 'JOIN respon ON respon.ID_USER = t.ID_USER JOIN respon_detail ON respon.ID_RESPON = respon_detail.ID_RESPON';
            $criteria->condition = 'ID_PERTANYAAN = :id_pertanyaan AND RESPON LIKE :respon AND TYPE = :type AND APPROVAL = :approval AND t.ID_USER = :id_user';
            $criteria->params = array('id_pertanyaan' => $id_pertanyaan, 'respon' => $respon, 'type' => $type, 'approval' => $approval, 'id_user' => $id_user,);
            $criteria->select = 'COUNT(*) as COUNT';

            $count = User::model()->find($criteria)->COUNT;
            $data['baru'][] = (int) $count;
        }
        ?>
        <?php
        $this->Widget('ext.highcharts.HighchartsWidget', array(
            'options' => array(
                'chart' => array('renderTo' => 'container',),
                'title' => array('text' => 'Jumlah Survei Per Kategori Toko'),
                'chart' => array('type' => 'column'),
                'credits' => array('enabled' => false),
                'xAxis' => array(
                    'categories' => $x_axis
                ),
                'yAxis' => array(
                    'title' => array('text' => 'Jumlah')
                ),
                'series' => array(
                    array('name' => 'Baru', 'data' => $data['baru']),
                    array('name' => 'Lama', 'data' => $data['lama']),
                )
            )
        ));
        ?>
    </div>
    <div class="span4">
        <table class="table table-striped table-bordered">
            <tr>
                <td rowspan="2" style="text-align: center; vertical-align: middle">
                    <strong>Surveyor</strong>
                </td>
                <td colspan="2" style="text-align: center; vertical-align: middle">
                    <strong><?php echo SurveiPertanyaan::model()->findByPk($id_pertanyaan)->PERTANYAAN; ?></strong>
                </td>
            </tr>			
            <tr>
                <td>
                    <strong>Baru</strong>
                </td>
                <td>
                    <strong>Lama</strong>
                </td>
            </tr>			
            <?php
            $index = 0;
            foreach ($list_user as $user) {
            ?>
                <tr>
                    <td>
                        <?php echo $user->NAMA; ?>
                    </td>
                    <td>
                        <?php echo $data['baru'][$index]; ?>
                    </td>
                    <td>
                        <?php echo $data['lama'][$index]; ?>
                    </td>
                </tr>
            <?php $index++;
            }
            ?>
        </table>
    </div>
</div>
<div class="form-actions">
        <div class="pull-left">
        <?php
            echo CHtml::link('<i class="icon-share-alt" style="margin-top: 0px" ></i> Kembali', Yii::app()->createUrl('/laporan/chart'), array('class' => 'btn btn-large'));
        ?>
    </div>
</div>