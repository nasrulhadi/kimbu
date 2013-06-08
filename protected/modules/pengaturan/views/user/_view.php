<tr>
    <td width="5%"><?php echo CHtml::encode($data->ID_USER); ?></td>
    <td><?php echo CHtml::encode($data->NAMA); ?></td>
    <td><?php echo CHtml::encode($data->EMAIL); ?></td>
    <td><?php echo CHtml::encode($data->TLP); ?></td>
    <td><?php echo CHtml::encode($data->USERNAME); ?></td>
    <td>
        <?php echo CHtml::link('<i class="icon-eye-open"></i>', array('view','id'=>$data->ID_USER), array('title' => 'Detail', 'class' => 'sepV_a')); ?>
        <?php echo CHtml::link('<i class="icon-pencil"></i>', array('update','id'=>$data->ID_USER), array('title' => 'Edit', 'class' => 'sepV_a')); ?>
        <?php echo CHtml::link('<i class="icon-trash"></i>','#',array('submit'=>array('delete','id'=>$data->ID_USER),'confirm'=>'Anda yakin akan menghapus '.ucwords(strtolower($data->NAMA)).' dari data pegawai?')); ?>
    </td>
</tr>