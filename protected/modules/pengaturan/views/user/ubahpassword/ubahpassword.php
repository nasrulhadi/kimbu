<?php
/* @var $this m_siswaController */
/* @var $model m_siswa */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Ubah Password';
$this->breadcrumbs=array(
    'Manajemen User'=>array('./user'),
     Yii::app()->user->id=>array('./user/view/id/'.Yii::app()->user->id),
	'Ubah Password',
);
?>
<div class="pagetitle"><h1>Ubah Kode Akses | <?php echo Yii::app()->user->id; ?></h1></div>
<?php echo @Yii::app()->user->getFlash('info');?>
<?php echo $this->renderPartial('ubahpassword/_form', array('model'=>$model)); ?>