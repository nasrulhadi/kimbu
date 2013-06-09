<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::encode($data->NAMA); ?></td>
    <td><?php echo CHtml::encode($data->DIBUAT_OLEH); ?></td>
    <td><?php echo CHtml::encode($data->STATUS); ?></td>
    <td><?php echo CHtml::encode($data->DIBUAT_TANGGAL); ?></td>
    <td>
        <?php echo CHtml::link('<i class="icon-eye-open"></i>', array('view','id'=>$data->ID_CHAT), array('title' => 'Detail', 'class' => 'sepV_a')); ?>
        <?php echo CHtml::link('<i class="icon-pencil"></i>', array('update','id'=>$data->ID_CHAT), array('title' => 'Edit', 'class' => 'sepV_a')); ?>
        <?php echo CHtml::link('<i class="icon-trash"></i>','#',array('submit'=>array('delete','id'=>$data->ID_CHAT),'confirm'=>'Anda yakin akan menghapus obrolan '.ucwords(strtolower($data->NAMA)).' dari system?')); ?>
    </td>
</tr>