<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle=Yii::app()->name . ' - Detil User';

$this->breadcrumbs=array(
	'Dashboard'=>array('/'),
    'Manajemen User'=>array('index'),
	$model->NAMA,
);
?>

<h3 class="heading">Detil User | <?php echo $model->NAMA; ?></h3>
<?php echo @Yii::app()->user->getFlash('info');?>
<div class="row-fluid">
    <div class="span4">
        <h4 class="heading">Foto User</h4>
            <a href="<?php echo $model->FOTO==NULL || $model->FOTO=='tidakadafoto.jpg' ? Yii::app()->theme->baseUrl.'/img/profilethumb.png' : Yii::app()->request->baseUrl.'/file/foto/'.$model->FOTO; ?>" rel="gallery" class="cboxElement"><?php echo $model->displayPicture($model->FOTO);?></a>
            </br>
        <div style="margin-top: 20px;">
            <a href="<?php echo Yii::app()->createUrl('root/user/editfoto/'.$model->ID_USER);?>" data-toggle="modal" data-backdrop="static" onclick="showOnModal(jQuery(this).attr('href'))" class="btn btn-large btn-success"><i class="icon-folder-open icon-white"></i> Ubah Foto</a>
            <?php echo CHtml::link('<span class="icon-pencil"></span> Edit Profile', array('update', 'id'=>$model->ID_USER), array('class' => 'btn btn-large')); ?>
        </div>
    </div>
    <div class="span8">
        <h4 class="heading">Identitas User</h4>
        <?php $this->widget('zii.widgets.CDetailView', array(
            'htmlOptions'=>array('class'=>'table table-striped table-bordered'),
            'data'=>$model,
            'attributes'=>array(
                'NAMA',
                array(
                    'name'=>'DIVISI',
                    'value'=>$model->Divisi->NAMA,
                ),
                array(
                    'name'=>'PERUSAHAAN'
                ),
                'USERNAME',
                array(
                    'name' => 'PASSWORD',
                    'type' => 'raw',
                    'value' => CHtml::link('Ubah Password?', array('ubahpassword', 'id'=>$model->ID_USER),array('class'=>'btn btn-gebo')),
                ),
                array(
                    'name'=>'TYPE',
                    'type'=>'role',
                    'value'=>$model->TYPE,
                ),
                'EMAIL',
                'TLP',
                'HP',
                array(
                    'name'=>'STATUS',
                    'type'=>'statusAktif',
                    'value'=>$model->STATUS,
                )
            ),
        )); ?>
        <br>
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

<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="unggahFoto">
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