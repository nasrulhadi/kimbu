<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::encode(ucwords($data->NAMA)); ?></td>
    <td width="15%"><?php echo CHtml::encode($data->DIBUAT_OLEH); ?></td>
    <td width="15%"><?php echo CHtml::encode($data->TERAKHIR_UPDATE===NULL?"Tidak Pernah":date("d/m/Y H:i", strtotime($data->TERAKHIR_UPDATE))); ?></td>
    <td width="10%">
        <?php echo CHtml::link('<i class="icon-eye-open"></i>', array('view','id'=>$data->ID_CHAT), array('title' => 'Detail', 'class' => 'sepV_a')); ?>
        <?php echo CHtml::link('<i class="icon-pencil"></i>', array('update','id'=>$data->ID_CHAT), array('title' => 'Edit', 'class' => 'sepV_a')); ?>
        <?php echo CHtml::link('<i class="icon-trash"></i>','#',array('submit'=>array('delete','id'=>$data->ID_CHAT),'confirm'=>'Anda yakin akan menghapus obrolan '.ucwords(strtolower($data->NAMA)).' dari system?')); ?>
    </td>
</tr>