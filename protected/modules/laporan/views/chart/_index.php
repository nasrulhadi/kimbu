<?php
if(WebUser::isAdmin()){ 
    $jumlahDisetujui = $data->countClient;
    $jumlahTidakDisetujui = $data->countNotApproved;
    $jumlahSemua = $data->countAll;
    $classSetuju = "label label-success";
    $classTidakSetuju = "label label-warning";
} elseif (WebUser::isClient()) {
    $jumlahDisetujui = $data->iDDIVISI->NAMA;
    $jumlahTidakDisetujui = $data->TYPE===1?"Toko & Penjualan":"End User";
    $jumlahSemua = $data->countClient;
    $classSetuju = null;
    $classTidakSetuju = null;
}
?>
<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::link($data->NAMA_SURVEI, array('view', 'id' => $data->ID_SURVEI)); ?></td>
    <td><?php echo CHtml::encode($data->KETERANGAN); ?></td>
    <td width="15%"><span class="<?php echo $classSetuju; ?>"><?php echo CHtml::encode($jumlahDisetujui); ?></span></td>
    <td width="17%"><span class="<?php echo $classTidakSetuju; ?>"><?php echo CHtml::encode($jumlahTidakDisetujui); ?></span></td>
    <td width="15%"><span class="label label-info"><?php echo CHtml::encode($jumlahSemua); ?></span></td>
</tr>