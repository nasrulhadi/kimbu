<?php
$countUser = ChatUser::model()->countByAttributes(array('ID_CHAT' => $data->ID_CHAT, 'STATUS' => 1))
?>
<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::link($data->NAMA, array('view', 'id' => $data->ID_CHAT)); ?></td>
    <td width="20%"><?php echo CHtml::encode(MyFormatter::formatDateTimeFormat($data->DIBUAT_TANGGAL)); ?></td>
    <td width="20%"><?php echo CHtml::encode(MyFormatter::formatDateTimeFormat($data->TERAKHIR_UPDATE)); ?></td>
    <td width="20%"><?php echo CHtml::encode($countUser); ?></td>
</tr>