<?php
/* @var $this ProfileController */
/* @var $model User */

$this->breadcrumbs=array(
	'Profile'
);
?>

<h3 class="heading">Profile</h3>
<?php echo @Yii::app()->user->getFlash('info');?>
<div class="row-fluid">
    <div class="span6">
<!--        <h4 class="widgettitle nomargin">Identitas<?php //echo CHtml::link('Edit Profile',array('profile/setting'),array('class'=>'showhide'));?></h4>-->
        <div class="w-box">
            <div class="w-box-header">
                Identitas
                <div class="pull-right"><?php echo CHtml::link('Edit Profile',array('profile/setting'));?></div>
            </div>
            <div class="w-box-content cnt_a">
                <table class="table">
                <tr>
                    <td>Nama</td>
                    <td><?php echo $model->NAMA;?></td>
                </tr>
                <tr>
                    <td>No. Telepon</td>
                    <td><?php echo $model->TLP;?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $model->EMAIL;?></td>
                </tr>
            </table>
            </div>
        </div>
    </div>
    <div class="span6">
        <div class="w-box">
            <div class="w-box-header">Informasi Akun</div>
            <div class="w-box-content cnt_a">
                <table class="table">
                <tr>
                    <td>Username</td>
                    <td><?php echo $model->NAMA;?></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><?php echo CHtml::link('Ubah Password?',array('profile/ubahpassword'),array('class'=>'btn btn-mini btn-gebo'))?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php echo ($model->STATUS==User::STATUS_AKTIF)?'<span class="label label-warning">Active</span>':'<span class="label label-error">Disabled</span>'?></td>
                </tr>
                </table>
            </div>
        </div>
    </div>
</div>