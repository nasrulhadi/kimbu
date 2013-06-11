<?php
/* @var $this PerusahaanController */
/* @var $data Perusahaan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PERUSAHAAN')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_PERUSAHAAN), array('view', 'id'=>$data->ID_PERUSAHAAN)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAIL')); ?>:</b>
	<?php echo CHtml::encode($data->EMAIL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TLP')); ?>:</b>
	<?php echo CHtml::encode($data->TLP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FAX')); ?>:</b>
	<?php echo CHtml::encode($data->FAX); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LOGO')); ?>:</b>
	<?php echo CHtml::encode($data->LOGO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALAMAT')); ?>:</b>
	<?php echo CHtml::encode($data->ALAMAT); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('KOTA')); ?>:</b>
	<?php echo CHtml::encode($data->KOTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KETERANGAN')); ?>:</b>
	<?php echo CHtml::encode($data->KETERANGAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TERAKHIR_UPDATE')); ?>:</b>
	<?php echo CHtml::encode($data->TERAKHIR_UPDATE); ?>
	<br />

	*/ ?>

</div>