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
        <h4 class="heading">Foto User</h4>
<!--            <a href="<?php //echo Yii::app()->request->baseUrl; ?>/file/foto/<?php //echo $model->FOTO; ?>" rel="gallery" class="cboxElement"><?php //echo $model->displayPicture($model->FOTO);?></a>-->
        <div class="profilethumb">
            <a href="<?php echo Yii::app()->createUrl('root/profile/editfoto');?>" data-toggle="modal" onclick="showOnModal(jQuery(this).attr('href'))" style="display: inline;"><i class="icon-folder-open icon-white"></i> Ubah Foto</a>
            <?php echo $model->displayPicture($model->FOTO);?>
        </div>    
            
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

<script type="text/javascript">
function showOnModal(url)
{
    event.preventDefault()
    jQuery('#unggahFoto').removeData("modal");
    jQuery('#unggahFoto').modal({remote: url});
}
jQuery(document).ready(function(){

	jQuery('.profilethumb').hover(function(){
		jQuery(this).find('a').fadeIn();
	},function(){
		jQuery(this).find('a').fadeOut();
	});
	
	jQuery('.taglist a').click(function(){
		return false;
	});
	jQuery('.taglist a span').click(function(){
		jQuery(this).parent().remove();
		return false;
	});
	
});
</script>

<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="unggahFoto">
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h3 id="myModalLabel"><span id="modalTitle">Unggah Foto</span></h3>
    </div>
    <div class="modal-body">
        <div id="modalContent"></div>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn">Tutup</button>
    </div>
    
</div><!--#myModal-->