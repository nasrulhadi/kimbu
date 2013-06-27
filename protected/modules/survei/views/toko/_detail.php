<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::link($data->NAMA===""?"belum di definisikan":$data->NAMA, array('viewsurvei', 'id' => $data->ID_RESPON)); ?></td>
    <td><?php echo CHtml::encode($data->iDUSER->NAMA); ?></td>
    <td width="15%"><?php echo CHtml::encode($data->TANGGAL_PENGISIAN); ?></td>
    <td width="17%"><?php echo CHtml::encode($data->APPROVAL); ?></td>
</tr>