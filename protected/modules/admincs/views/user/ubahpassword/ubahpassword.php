<?php
/* @var $this m_siswaController */
/* @var $model m_siswa */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Ubah Password';
$this->breadcrumbs=array(
    'Dashboard'=>array('./'),
    'Manajemen Akun'=>array('./user'),
     $user->USERNAME=>array('./user/view/'.$user->ID_USER),
	'Ubah Password',
);
?>
<h3 class="heading">Ubah Password | <?php echo $user->USERNAME; ?></h3>
<?php echo $this->renderPartial('ubahpassword/_form', array('model'=>$model)); ?>