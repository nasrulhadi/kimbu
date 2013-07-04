<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::encode(ucwords(strtolower($data->NAMA))); ?></td>
    <td><?php echo CHtml::encode($data->USERNAME); ?></td>
    <td><?php echo CHtml::encode($data->EMAIL); ?></td>
    <td><?php echo CHtml::encode($data->TLP); ?></td>
    <td><?php echo CHtml::encode(MyFormatter::formatDateFormat($data->TERAKHIR_LOGIN)); ?></td>
    <td><?php echo $data->STATUS==0?"<span class=\"label label-warning\">Non Aktif</span>":"<span class=\"label label-success\">Aktif</span>"; ?></td>
    <td>
        <?php echo CHtml::link('<i class="icon-eye-open"></i>', array('view','id'=>$data->ID_USER), array('title' => 'Detail', 'class' => 'sepV_a')); ?>
        <?php echo CHtml::link('<i class="icon-pencil"></i>', array('update','id'=>$data->ID_USER), array('title' => 'Edit', 'class' => 'sepV_a')); ?>
        <?php echo CHtml::link('<i class="icon-trash"></i>',array('delete','id'=>$data->ID_USER), array('submit'=>array('delete','id'=>$data->ID_USER),'confirm'=>'Anda yakin akan menghapus '.ucwords(strtolower($data->NAMA)).'?')); ?>
    </td>
</tr>