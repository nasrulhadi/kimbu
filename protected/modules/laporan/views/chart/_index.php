<?php
if(WebUser::isAdmin()){ 
    $jumlahSemua = $data->countAll;
} elseif (WebUser::isClient()) {
    $jumlahSemua = $data->countClient;
}
?>
<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::link($data->NAMA_SURVEI, array('view', 'id' => $data->ID_SURVEI)); ?></td>
    <td><?php echo CHtml::encode($data->KETERANGAN); ?></td>
    <td><?php echo CHtml::encode($data->iDDIVISI->NAMA); ?></td>
    <td><?php echo CHtml::encode($data->TYPE==1?"Toko & Penjualan":"End User"); ?></td>
    <td width="15%"><span class="label label-info"><?php echo CHtml::encode($jumlahSemua); ?></span></td>
</tr>