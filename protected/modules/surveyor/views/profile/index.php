<?php
/* @var $this ProfileController */
/* @var $model User */

$this->breadcrumbs=array(
    'Dashboard'=>('/'),
	'Profile'
);
?>

<h3 class="heading">Profile | <?php echo $model->NAMA; ?></h3>
<?php echo @Yii::app()->user->getFlash('info');?>
<div class="row-fluid">
    <div class="span3">
<!--        <div class="w-box">
            <div class="w-box-header">Foto User</div>
            <div class="w-box-content cnt_a">
                <div class="profilethumb">
                    <?php //echo $model->displayPicture($model->FOTO);?>
                </div>
            </div>
        </div>-->
        <h4>Foto User</h4></br>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/file/foto/<?php echo $model->FOTO; ?>" rel="gallery" class="cboxElement"><?php echo $model->displayPicture($model->FOTO);?></a>
            
    </div>
    <div class="span9">
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
                    <td>No. Handphone</td>
                    <td><?php echo $model->HP;?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $model->EMAIL;?></td>
                </tr>
            </table>
            </div>
        </div>
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