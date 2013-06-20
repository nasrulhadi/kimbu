<?php
/* @var $this DivisiController */
/* @var $data Divisi */
?>

<tr>
    <td width="5%"><?php echo $index+1; ?></td>
    <td><?php echo CHtml::encode($data->NAMA); ?></td>
    <td><?php echo CHtml::encode($data->KETERANGAN); ?></td>
    <td><a href="<?php echo Yii::app()->request->baseUrl; ?>/file/logo/divisi/<?php echo $data->LOGO; ?>" class="cboxElement"><img src="<?php echo Yii::app()->request->baseUrl;?>/file/logo/divisi/<?php echo $data->LOGO; ?>" style="height: 50px; width: 50px" ></a></td>
    <td>
        <?php echo CHtml::link('<i class="icon-pencil"></i>', array('update','id'=>$data->ID_DIVISI), array('title' => 'Edit', 'class' => 'sepV_a')); ?>
        <?php echo CHtml::link('<i class="icon-eye-open"></i>', array('view','id'=>$data->ID_DIVISI), array('title' => 'Update', 'class' => 'sepV_a')); ?>
        <?php echo CHtml::link('<i class="icon-trash"></i>','#',array('submit'=>array('delete','id'=>$data->ID_DIVISI),'confirm'=>'Anda yakin akan menghapus item ini?')); ?>
    </td>
</tr>