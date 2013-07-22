<?php
/*
 *  $model = survei
 *  $respon = respon by id survei
 *  $form = looping $respon
 * 
 */

$respon = Respon::model()->findAllByAttributes(array('ID_SURVEI' => $model->ID_SURVEI, 'APPROVAL' => 1));
//$respon = Respon::model()->findByPk(1024);
echo CHtml::link('<span class="iconsweets-excel2 iconsweets-white"></span> Unduh Data',array('./excel/export'),array('class'=>'btn btn-warning','target'=>'_blank'));

foreach ($respon as $responses) {
    echo '<table class="table table-striped" border="1"><tr>';
    foreach ($model->surveiForms as $form) {
        $this->renderPartial('_index', array('model' => $form, 'survei' => $model, 'respon' => $responses));
    }
    echo '</tr></table>';
}