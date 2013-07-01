<?php
$linkNamaSurvei = $data->NAMA;

if(WebUser::isAdmin()){ 
    if($data->APPROVAL == 1){
        $linkNamaSurvei = CHtml::link($data->NAMA===""?"belum di definisikan":$data->NAMA, array('update', 'id' => $data->ID_RESPON));
    } elseif ($data->APPROVAL == 0) {
        $linkNamaSurvei = CHtml::link($data->NAMA===""?"belum di definisikan":$data->NAMA, array('view', 'id' => $data->ID_RESPON));
    }
} elseif (WebUser::isSurveyor()) {
    if($data->APPROVAL == 1){
        $linkNamaSurvei = CHtml::link($data->NAMA===""?"belum di definisikan":$data->NAMA, array('view', 'id' => $data->ID_RESPON));
    } elseif ($data->APPROVAL == 0) {
        $linkNamaSurvei = CHtml::link($data->NAMA===""?"belum di definisikan":$data->NAMA, array('update', 'id' => $data->ID_RESPON));
    }
} elseif (WebUser::isClient()) {
    if($data->APPROVAL == 1 || $data->APPROVAL == 0){
        $linkNamaSurvei = CHtml::link($data->NAMA===""?"belum di definisikan":$data->NAMA, array('view', 'id' => $data->ID_RESPON));
    }
}
?>
<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo $linkNamaSurvei; ?></td>
    <td width="20%"><?php echo CHtml::encode($data->iDUSER->NAMA); ?></td>
    <td width="20%"><?php echo CHtml::encode(MyFormatter::formatDateTimeFormat($data->TANGGAL_PENGISIAN)); ?></td>
    <td width="20%"><?php echo $data->APPROVAL==0?"<span class=\"label label-warning\">Belum Disetujui</span>":"<span class=\"label label-success\">Disetujui</span>"; ?></td>
</tr>