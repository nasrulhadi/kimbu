<?php
/* @var $this DivisiController */
/* @var $data Divisi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_DIVISI')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_DIVISI), array('view', 'id'=>$data->ID_DIVISI)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PERUSAHAAN')); ?>:</b>
	<?php echo CHtml::encode($data->ID_PERUSAHAAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KETERANGAN')); ?>:</b>
	<?php echo CHtml::encode($data->KETERANGAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LOGO')); ?>:</b>
	<?php echo CHtml::encode($data->LOGO); ?>
	<br />


</div>