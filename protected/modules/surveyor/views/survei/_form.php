<?php
/* @var $this ProfileController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<table class="table">

    <?php
    $respon_detail_objects = array();
    ?>
    <?php
    foreach ($model->surveiPertanyaans as $pertanyaan) {

        if (!isset($respon)) {
            ?>
            <tr>
                <td>
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
                            echo CHtml::radioButtonList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']', '', CHtml::ListData($pertanyaan->surveiPilihanJawabans, 'ID_SURVEI_JAWABAN', 'JAWABAN'), array('template'=>'<label class="radio">{input}{label}</label>', 'separator'=>''));
                            break;
                        case SurveiPertanyaan::CHECKBOX:
                            echo CHtml::checkBoxList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']', '', CHtml::ListData($pertanyaan->surveiPilihanJawabans, 'ID_SURVEI_JAWABAN', 'JAWABAN'), array('template'=>'<label class="checkbox">{input}{label}</label>', 'separator'=>''));
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
                                $options[$jawaban->ID_SURVEI_JAWABAN] = str_replace('{input}', CHtml::TextField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][FIELD' . $jawaban->ID_SURVEI_JAWABAN . ']', '', array('class'=>'input-small')), $jawaban->JAWABAN);
                            }
                            echo CHtml::radioButtonList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][RADIO]', '', $options, array('template'=>'<label class="radio">{input}{label}</label>', 'separator'=>''));
                            break;
                        case SurveiPertanyaan::CHECKBOX_FIELD:
                            $options = array();
                            foreach ($pertanyaan->surveiPilihanJawabans as $jawaban) {
                                $options[$jawaban->ID_SURVEI_JAWABAN] = str_replace('{input}', CHtml::TextField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][FIELD' . $jawaban->ID_SURVEI_JAWABAN . ']', '', array('class'=>'input-small')), $jawaban->JAWABAN);
                            }
                            echo CHtml::checkBoxList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][CHECKBOX]', '', $options, array('template'=>'<label class="checkbox">{input}{label}</label>', 'separator'=>''));
                            break;
                    }
                    ?>
                </td>
            </tr>

        <?php
    } else {
        ?>
            <tr>
                <td>
            <?php echo CHtml::label($pertanyaan->PERTANYAAN, ''); ?>
            <?php
            $pertanyaan_respon = ResponDetail::model()->findByAttributes(array('ID_PERTANYAAN' => $pertanyaan->ID_SURVEI_PERTANYAAN, 'ID_RESPON' => $respon->ID_RESPON,));
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
                            echo CHtml::radioButtonList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']', $respon_value, CHtml::ListData($pertanyaan->surveiPilihanJawabans, 'ID_SURVEI_JAWABAN', 'JAWABAN'));
                            break;
                        case SurveiPertanyaan::CHECKBOX:
                            echo CHtml::checkBoxList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']', $respon_value, CHtml::ListData($pertanyaan->surveiPilihanJawabans, 'ID_SURVEI_JAWABAN', 'JAWABAN'));
                            break;
                        case SurveiPertanyaan::DROPDOWN:
                            echo CHtml::dropDownList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']', $respon_value, CHtml::ListData($pertanyaan->surveiPilihanJawabans, 'ID_SURVEI_JAWABAN', 'JAWABAN'));
                            break;
                        case SurveiPertanyaan::UPLOAD:
                            echo CHtml::FileField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . ']');
                            break;
                        case SurveiPertanyaan::RADIO_FIELD:
                            $options = array();

                            foreach ($pertanyaan->surveiPilihanJawabans as $jawaban) {
                                if (isset($respon_value['FIELD' . $jawaban->ID_SURVEI_JAWABAN])) {
                                    $options[$jawaban->ID_SURVEI_JAWABAN] = str_replace('{input}', CHtml::TextField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][FIELD' . $jawaban->ID_SURVEI_JAWABAN . ']', $respon_value['FIELD' . $jawaban->ID_SURVEI_JAWABAN]), $jawaban->JAWABAN);
                                } else {
                                    $options[$jawaban->ID_SURVEI_JAWABAN] = str_replace('{input}', CHtml::TextField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][FIELD' . $jawaban->ID_SURVEI_JAWABAN . ']'), $jawaban->JAWABAN);
                                }
                            }
                            echo CHtml::radioButtonList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][RADIO]', $respon_value['RADIO'], $options);
                            break;
                        case SurveiPertanyaan::CHECKBOX_FIELD:
                            $options = array();

                            foreach ($pertanyaan->surveiPilihanJawabans as $jawaban) {

                                if (isset($respon_value['FIELD' . $jawaban->ID_SURVEI_JAWABAN])) {
                                    $options[$jawaban->ID_SURVEI_JAWABAN] = str_replace('{input}', CHtml::TextField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][FIELD' . $jawaban->ID_SURVEI_JAWABAN . ']', $respon_value['FIELD' . $jawaban->ID_SURVEI_JAWABAN]), $jawaban->JAWABAN);
                                } else {
                                    $options[$jawaban->ID_SURVEI_JAWABAN] = str_replace('{input}', CHtml::TextField($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][FIELD' . $jawaban->ID_SURVEI_JAWABAN . ']'), $jawaban->JAWABAN);
                                }
                            }
                            echo CHtml::checkBoxList($model->ID_SURVEI_FORM . '[' . $pertanyaan->ID_SURVEI_PERTANYAAN . '][CHECKBOX]', $respon_value['CHECKBOX'], $options);
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
