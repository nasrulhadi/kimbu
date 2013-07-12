
<!-- grafik <?php echo $index+1; ?> -->
<div class="row-fluid" style="margin-top: 40px;">
    <div class="span8">
        <?php
        $hitung = GrafikParameter::model()->countByAttributes(array('ID_GRAFIK' => $data->ID_GRAFIK, 'NAMA' => 'respon_tambahan'));
        $id_pertanyaan = $data->ID_PERTANYAAN;
        $count_awal = GrafikParameter::getValue($data->ID_GRAFIK, 'count_awal');
        $count_akhir = GrafikParameter::getValue($data->ID_GRAFIK, 'count_akhir');
        $respon_awal = GrafikParameter::getValue($data->ID_GRAFIK, 'respon_awal');
        $respon_akhir = GrafikParameter::getValue($data->ID_GRAFIK, 'respon_akhir');
        if($hitung == 1){
            $count_tambahan = GrafikParameter::getValue($data->ID_GRAFIK, 'count_tambahan');
            $respon_tambahan = GrafikParameter::getValue($data->ID_GRAFIK, 'respon_tambahan');
        }
        $type = 3;
        $approval = 1;
        $data = array();
        $x_axis = array();
        $list_user = User::model()->findAllByAttributes(array(), $condition = 'TYPE = 3 AND ID_USER <> 2');
        $txt_pertanyaan = SurveiPertanyaan::model()->findByPk($id_pertanyaan)->PERTANYAAN;
        foreach ($list_user as $user) {
            $x_axis[] = $user->NAMA;
            $id_user = $user->ID_USER;

            $criteria = new CDbCriteria;
            $respon = '%'.$respon_awal.'%';
            $criteria->join = 'JOIN respon ON respon.ID_USER = t.ID_USER JOIN respon_detail ON respon.ID_RESPON = respon_detail.ID_RESPON';
            $criteria->condition = 'ID_PERTANYAAN = :id_pertanyaan AND RESPON LIKE :respon AND TYPE = :type AND APPROVAL = :approval AND t.ID_USER = :id_user';
            $criteria->params = array('id_pertanyaan' => $id_pertanyaan, 'respon' => $respon, 'type' => $type, 'approval' => $approval, 'id_user' => $id_user,);
            $criteria->select = 'COUNT(*) as COUNT';

            $count = User::model()->find($criteria)->COUNT;
            $data[$count_awal][] = (int) $count;

            $criteria = new CDbCriteria;
            $respon = '%'.$respon_akhir.'%';
            $criteria->join = 'JOIN respon ON respon.ID_USER = t.ID_USER JOIN respon_detail ON respon.ID_RESPON = respon_detail.ID_RESPON';
            $criteria->condition = 'ID_PERTANYAAN = :id_pertanyaan AND RESPON LIKE :respon AND TYPE = :type AND APPROVAL = :approval AND t.ID_USER = :id_user';
            $criteria->params = array('id_pertanyaan' => $id_pertanyaan, 'respon' => $respon, 'type' => $type, 'approval' => $approval, 'id_user' => $id_user,);
            $criteria->select = 'COUNT(*) as COUNT';

            $count = User::model()->find($criteria)->COUNT;
            $data[$count_akhir][] = (int) $count;
            
            if($hitung == 1){
                $criteria = new CDbCriteria;
                $respon = '%'.$respon_tambahan.'%';
                $criteria->join = 'JOIN respon ON respon.ID_USER = t.ID_USER JOIN respon_detail ON respon.ID_RESPON = respon_detail.ID_RESPON';
                $criteria->condition = 'ID_PERTANYAAN = :id_pertanyaan AND RESPON LIKE :respon AND TYPE = :type AND APPROVAL = :approval AND t.ID_USER = :id_user';
                $criteria->params = array('id_pertanyaan' => $id_pertanyaan, 'respon' => $respon, 'type' => $type, 'approval' => $approval, 'id_user' => $id_user,);
                $criteria->select = 'COUNT(*) as COUNT';

                $count = User::model()->find($criteria)->COUNT;
                $data[$count_tambahan][] = (int) $count;
            }
        }
        ?>
        <?php
        if($hitung == 1){
            $series_array = array(
                    array('name' => ucwords($count_awal), 'data' => $data[$count_awal]),
                    array('name' => ucwords($count_akhir), 'data' => $data[$count_akhir]),
                    array('name' => ucwords($count_tambahan), 'data' => $data[$count_tambahan]),);
            $colspan = 4;
        }else{
            $series_array = array(
                    array('name' => ucwords($count_awal), 'data' => $data[$count_awal]),
                    array('name' => ucwords($count_akhir), 'data' => $data[$count_akhir]));
            $colspan = 3;
        }
        $this->Widget('ext.highcharts.HighchartsWidget', array(
            'options' => array(
                'chart' => array('renderTo' => 'container',),
                'title' => array('text' => 'Statistik '.$txt_pertanyaan),
                'chart' => array('type' => 'column'),
                'credits' => array('enabled' => false),
                'xAxis' => array(
                    'categories' => $x_axis
                ),
                'yAxis' => array(
                    'title' => array('text' => 'Jumlah')
                ),
                'series' => $series_array,
            )
        ));
        ?>
    </div>
    <div class="span4">
        <table class="table table-striped table-bordered">
            <tr>
                <td colspan="<?php echo $colspan; ?>" style="text-align: center; vertical-align: middle">
                    <strong><?php echo $txt_pertanyaan; ?></strong>
                </td>
            </tr>			
            <tr>
                <td>
                    <strong>Surveyor</strong>
                </td>
                <td>
                    <strong><?php echo ucwords($count_awal) ?></strong>
                </td>
                <td>
                    <strong><?php echo ucwords($count_akhir) ?></strong>
                </td>
                <?php if($hitung == 1){ ?>
                    <td>
                        <strong><?php echo ucwords($count_tambahan) ?></strong>
                    </td>
                <?php } ?>
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
                        <?php echo $data[$count_awal][$index]; ?>
                    </td>
                    <td>
                        <?php echo $data[$count_akhir][$index]; ?>
                    </td>
                    <?php if($hitung == 1){ ?>
                    <td>
                        <?php echo $data[$count_tambahan][$index]; ?>
                    </td>
                <?php } ?>
                </tr>
            <?php $index++;
            }
            ?>
        </table>
    </div>
</div>
