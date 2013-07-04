<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td width="30%"><?php echo CHtml::encode($data->NAMA); ?></td>
    <td width="8%"><a href="<?php echo $data->LOGO=='tidakadalogo.jpg' ? Yii::app()->theme->baseUrl.'/img/tidakadalogo.jpg' : Yii::app()->request->baseUrl.'/file/logo/divisi/'.$data->LOGO; ?>" class="cbox_single thumbnail cboxElement"><?php echo $data->displayLogoPicture($data->LOGO); ?></a></td>
    <td width="20%"><?php echo CHtml::encode($data->KETERANGAN); ?></td>
    <td width="25%">
        <?php echo CHtml::link('<i class="icon-pencil"></i>', array('update','id'=>$data->ID_DIVISI), array('title' => 'Edit', 'class' => 'sepV_a')); ?>
        <?php echo CHtml::link('<i class="icon-eye-open"></i>', array('view','id'=>$data->ID_DIVISI), array('title' => 'Update', 'class' => 'sepV_a')); ?>
        <?php echo CHtml::link('<i class="icon-trash"></i>','#',array('submit'=>array('delete','id'=>$data->ID_DIVISI),'confirm'=>'Anda yakin akan menghapus item ini?')); ?>
    </td>
</tr>