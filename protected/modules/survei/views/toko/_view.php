<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::link($data->NAMA_SURVEI, array('detailsurvei', 'id' => $data->ID_SURVEI)); ?></td>
    <td><?php echo CHtml::encode($data->KETERANGAN); ?></td>
    <td width="15%"><?php echo CHtml::encode($data->countClient); ?></td>
    <td width="17%"><?php echo CHtml::encode($data->countNotApproved); ?></td>
    <td width="15%"><?php echo CHtml::encode($data->countAll); ?></td>
</tr>