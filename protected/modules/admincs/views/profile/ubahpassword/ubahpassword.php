<?php
/* @var $this m_siswaController */
/* @var $model m_siswa */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Ubah Password';
$this->breadcrumbs=array(
    'Profile'=>array('index'),
	'Ubah Password'
);
?>
<h3 class="heading">Ubah Kode Password</h3>
<?php echo @Yii::app()->user->getFlash('info');?>
<?php echo $this->renderPartial('ubahpassword/_form', array('model'=>$model)); ?>