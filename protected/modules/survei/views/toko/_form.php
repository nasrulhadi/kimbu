<table class="table table-striped <?php echo $intop === true ? "table-bordered" : ""; ?>">
    <?php if ($intop) { ?>
        <tr>
            <td width="40%">
                Nama Survei
            </td>
            <td>
                <?php echo CHtml::label($survei->NAMA_SURVEI, '', array('style' => 'font-weight:bold')); ?>
            </td>
        </tr>
        <tr>
            <td>
                Keterangan
            </td>
            <td>
                <?php echo CHtml::label($survei->KETERANGAN, '', array('style' => 'font-weight:bold')); ?>
            </td>
        </tr>
    <?php } ?>

    <?php
    $respon_detail_objects = array();
    foreach ($model->surveiPertanyaans as $pertanyaan) {

        if (!isset($respon)) {
            ?>
            <tr>
                <td width="40%" <?php echo $intop===true?"":"style=\"border-right: 1px solid #ddd\""; ?>>
                    <?php echo CHtml::label($pertanyaan->PERTANYAAN, ''); ?>
                </td>
                <td>
                    <?php
                    switch ($pertanyaan->TYPE) {
                        case SurveiPertanyaan::TEXTFIELD:
                            echo CHtml::TextField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']');
                            break;
                        case SurveiPertanyaan::TEXTAREA:
                            echo CHtml::TextArea($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']');
                            break;
                        case SurveiPertanyaan::RADIO:
                            echo CHtml::radioButtonList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']', '', CHtml::ListData($pertanyaan->surveiPilihanJawabans, 'ID_SURVEI_JAWABAN', 'JAWABAN'), array('template' => '<label class="radio">{input}{label}</label>', 'separator' => ''));
                            break;
                        case SurveiPertanyaan::CHECKBOX:
                            echo CHtml::checkBoxList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']', '', CHtml::ListData($pertanyaan->surveiPilihanJawabans, 'ID_SURVEI_JAWABAN', 'JAWABAN'), array('template' => '<label class="checkbox">{input}{label}</label>', 'separator' => ''));
                            break;
                        case SurveiPertanyaan::DROPDOWN:
                            echo CHtml::dropDownList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']', '', CHtml::ListData($pertanyaan->surveiPilihanJawabans, 'ID_SURVEI_JAWABAN', 'JAWABAN'));
                            break;
                        case SurveiPertanyaan::UPLOAD:
                            echo CHtml::FileField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']');
                            break;
                        case SurveiPertanyaan::RADIO_FIELD:
                            $options = array();
                            foreach ($pertanyaan->surveiPilihanJawabans as $jawaban) {
                                $options[$jawaban->ID_SURVEI_JAWABAN] = str_replace('{input}', CHtml::TextField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][FIELD' . $jawaban->ID_SURVEI_JAWABAN . ']', '', array('class' => '')), $jawaban->JAWABAN);
                            }
                            echo CHtml::radioButtonList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][RADIO]', '', $options, array('template' => '<label class="radio">{input}{label}</label>', 'separator' => ''));
                            break;
                        case SurveiPertanyaan::CHECKBOX_FIELD:
                            $options = array();
                            foreach ($pertanyaan->surveiPilihanJawabans as $jawaban) {
                                $options[$jawaban->ID_SURVEI_JAWABAN] = str_replace('{input}', CHtml::TextField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][FIELD' . $jawaban->ID_SURVEI_JAWABAN . ']', '', array('class' => '')), $jawaban->JAWABAN);
                            }
                            echo CHtml::checkBoxList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][CHECKBOX]', '', $options, array('template' => '<label class="checkbox">{input}{label}</label>', 'separator' => ''));
                            break;
                    }
                    ?>
                </td>
            </tr>

            <?php
        } else {
            ?>
            <tr>
                <td width="40%" <?php echo $intop===true?"":"style=\"border-right: 1px solid #ddd\""; ?>>
                    <?php echo CHtml::label($pertanyaan->PERTANYAAN, ''); ?>
                    <?php
                    $pertanyaan_respon = ResponDetail::model()->findByAttributes(array('ID_PERTANYAAN' => $pertanyaan->ID_SURVEI_PERTANYAAN, 'ID_RESPON' => $respon->ID_RESPON,));
                    $respon_value = null;
                    if (!is_null($pertanyaan_respon)) {
                        $respon_value = json_decode($pertanyaan_respon->RESPON);
                        if (is_object($respon_value)) {
                            $respon_value = (array) $respon_value;
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    switch ($pertanyaan->TYPE) {
                        case SurveiPertanyaan::TEXTFIELD:
                            echo CHtml::TextField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']', $respon_value);
                            break;
                        case SurveiPertanyaan::TEXTAREA:
                            echo CHtml::TextArea($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']', $respon_value);
                            break;
                        case SurveiPertanyaan::RADIO:
                            echo CHtml::radioButtonList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']', $respon_value, CHtml::ListData($pertanyaan->surveiPilihanJawabans, 'ID_SURVEI_JAWABAN', 'JAWABAN'), array('template' => '<label class="radio">{input}{label}</label>', 'separator' => ''));
                            break;
                        case SurveiPertanyaan::CHECKBOX:
                            echo CHtml::checkBoxList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']', $respon_value, CHtml::ListData($pertanyaan->surveiPilihanJawabans, 'ID_SURVEI_JAWABAN', 'JAWABAN'), array('template' => '<label class="checkbox">{input}{label}</label>', 'separator' => ''));
                            break;
                        case SurveiPertanyaan::DROPDOWN:
                            echo CHtml::dropDownList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']', $respon_value, CHtml::ListData($pertanyaan->surveiPilihanJawabans, 'ID_SURVEI_JAWABAN', 'JAWABAN'));
                            break;
                        case SurveiPertanyaan::UPLOAD:
                            echo CHtml::link(Survei::displayPicture($respon_value), Yii::app()->createUrl(Yii::app()->request->baseUrl . "/" . $respon_value), array('class' => 'cboxElement', 'rel' => 'gallery'));
                            echo "<div class='clearfix' style='margin-top:10px;'></div>";
                            echo CHtml::FileField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']');
                            break;
                        case SurveiPertanyaan::RADIO_FIELD:
                            $options = array();

                            if (isset($respon_value['RADIO'])) {
                                $responValue = $respon_value['RADIO'];
                            } else {
                                $responValue = '';
                            }

                            foreach ($pertanyaan->surveiPilihanJawabans as $jawaban) {
                                if (isset($respon_value['FIELD' . $jawaban->ID_SURVEI_JAWABAN])) {
                                    $options[$jawaban->ID_SURVEI_JAWABAN] = str_replace('{input}', CHtml::TextField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][FIELD' . $jawaban->ID_SURVEI_JAWABAN . ']', $respon_value['FIELD' . $jawaban->ID_SURVEI_JAWABAN], array('class' => '')), $jawaban->JAWABAN);
                                } else {
                                    $options[$jawaban->ID_SURVEI_JAWABAN] = str_replace('{input}', CHtml::TextField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][FIELD' . $jawaban->ID_SURVEI_JAWABAN . ']', '', array('class' => '')), $jawaban->JAWABAN);
                                }
                            }
                            echo CHtml::radioButtonList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][RADIO]', $responValue, $options, array('template' => '<label class="radio">{input}{label}</label>', 'separator' => ''));
                            break;
                        case SurveiPertanyaan::CHECKBOX_FIELD:
                            $options = array();

                            if (isset($respon_value['CHECKBOX'])) {
                                $responValue = $respon_value['CHECKBOX'];
                            } else {
                                $responValue = '';
                            }

                            foreach ($pertanyaan->surveiPilihanJawabans as $jawaban) {

                                if (isset($respon_value['FIELD' . $jawaban->ID_SURVEI_JAWABAN])) {
                                    $options[$jawaban->ID_SURVEI_JAWABAN] = str_replace('{input}', CHtml::TextField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][FIELD' . $jawaban->ID_SURVEI_JAWABAN . ']', $respon_value['FIELD' . $jawaban->ID_SURVEI_JAWABAN], array('class' => '')), $jawaban->JAWABAN);
                                } else {
                                    $options[$jawaban->ID_SURVEI_JAWABAN] = str_replace('{input}', CHtml::TextField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][FIELD' . $jawaban->ID_SURVEI_JAWABAN . ']', '', array('class' => '')), $jawaban->JAWABAN);
                                }
                            }
                            echo CHtml::checkBoxList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][CHECKBOX]', $responValue, $options, array('template' => '<label class="checkbox">{input}{label}</label>', 'separator' => ''));
                            break;
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
