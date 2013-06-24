<?php
/* @var $this ProfileController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<table class="table">
    <?php
    $respon_detail_objects = array();
    foreach ($model->surveiPertanyaans as $pertanyaan) {
        ?>
        <tr>
            <td width="40%">
                <?php echo CHtml::label($pertanyaan->PERTANYAAN, ''); ?>
                <?php
                $pertanyaan_respon = ResponDetail::model()->findByAttributes(array('ID_PERTANYAAN' => $pertanyaan->ID_SURVEI_PERTANYAAN, 'ID_RESPON' => $respon->ID_RESPON,));
                $respon_value = null;
                if (!is_null($pertanyaan_respon)) {
                    $respon_value = json_decode($pertanyaan_respon->RESPON);
                    if (is_object($respon_value)) {
                        $respon_value = (array) $respon_value;
                    }
                } else {
                    $respon_value = '';
                }
                ?>
            </td>
            <td>
                <?php
                switch ($pertanyaan->TYPE) {
                    case SurveiPertanyaan::TEXTFIELD:
                        echo CHtml::label($respon_value, '');
                        break;
                    case SurveiPertanyaan::TEXTAREA:
                        echo CHtml::label($respon_value, '');
                        break;
                    case SurveiPertanyaan::RADIO:
                        if ($respon_value != null) {
                            $jawabanRadio = SurveiPilihanJawaban::model()->findByPk($respon_value)->JAWABAN;
                            if (isset($jawabanRadio) && $jawabanRadio != null) {
                                echo CHtml::label($jawabanRadio, '');
                            } else {
                                echo CHtml::label('-', '');
                            }
                        } else {
                            echo CHtml::label('-', '');
                        }
                        break;
                    case SurveiPertanyaan::CHECKBOX:
                        if (isset($respon_value)) {
                            foreach ($respon_value as $jawaban) {
                                echo CHtml::label(SurveiPilihanJawaban::model()->findByPk($jawaban)->JAWABAN, '');
                            }
                        } else {
                            echo CHtml::label('-', '');
                        }
                        break;
                    case SurveiPertanyaan::DROPDOWN:
                        echo CHtml::label(SurveiPilihanJawaban::model()->findByPk($respon_value)->JAWABAN, '');
                        break;
                    case SurveiPertanyaan::UPLOAD:
                        echo CHtml::link(Survei::displayPicture($respon_value), Yii::app()->createUrl(Yii::app()->request->baseUrl . "/" . $respon_value), array('class' => 'cboxElement', 'rel' => 'gallery'));
                        break;
                    case SurveiPertanyaan::RADIO_FIELD:
                        if (isset($respon_value['FIELD' . $respon_value['RADIO']])) {
                            echo CHtml::label(str_replace('{input}', $respon_value['FIELD' . $respon_value['RADIO']], SurveiPilihanJawaban::model()->findByPk($respon_value['RADIO'])->JAWABAN), '');
                        } else {
                            echo CHtml::label(str_replace('{input}', '', SurveiPilihanJawaban::model()->findByPk($respon_value['RADIO'])->JAWABAN), '');
                        }
                        break;
                    case SurveiPertanyaan::CHECKBOX_FIELD:
                        if (isset($respon_value['CHECKBOX'])) {
                            foreach ($respon_value['CHECKBOX'] as $jawaban) {
                                if (isset($respon_value['FIELD' . $jawaban])) {
                                    echo CHtml::label(str_replace('{input}', $respon_value['FIELD' . $jawaban], SurveiPilihanJawaban::model()->findByPk($jawaban)->JAWABAN), '');
                                } else {
                                    echo CHtml::label(str_replace('{input}', '', SurveiPilihanJawaban::model()->findByPk($respon_value['CHECKBOX'])->JAWABAN), '');
                                }
                            }
                        } else {
                            echo CHtml::label('-', '');
                        }
                        break;
                }
                ?>
            </td>
        </tr>

    <?php } ?>
</table>