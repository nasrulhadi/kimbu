<?php
/* @var $this PerusahaanController */
/* @var $model Perusahaan */

$this->pageTitle=Yii::app()->name . ' - Detil Perusahaan';

$this->breadcrumbs=array(
    'Dashboard'=>'/',
	'Manajemen Perusahaan'=>array('index'),
	'Detil Perusahaan',
);
?>

<h3 class="heading">Detil Perusahaan | <?php echo $model->NAMA; ?></h3>
<?php echo @Yii::app()->user->getFlash('info');?>
<div class="row-fluid">
    <div class="span3">
        <h4 class="heading">Logo Perusahaan</h4></br>
            <a href="<?php echo $model->LOGO=='tidakadalogo.jpg' ? Yii::app()->theme->baseUrl.'/img/tidakadalogo.jpg' : Yii::app()->request->baseUrl.'/file/logo/perusahaan/'.$model->LOGO; ?>" class="cboxElement"><?php echo $model->displayPicture($model->LOGO);?></a>
        </br>
        <div style="margin: 20px 0 20px 0">
            <a href="<?php echo Yii::app()->createUrl('root/perusahaan/editlogo/'.$model->ID_PERUSAHAAN);?>" data-toggle="modal" data-backdrop="static" onclick="showOnModal(jQuery(this).attr('href'))" class="btn btn-success"><i class="icon-folder-open icon-white"></i> Ubah Logo</a>
            <?php echo CHtml::link('<span class="icon-pencil"></span> Edit Data', array('update', 'id'=>$model->ID_PERUSAHAAN), array('class' => 'btn')); ?>
        </div>
    </div>
    <div class="span9">
        <h4 class="heading">Identitas Perusahaan</h4>
            <?php $this->widget('zii.widgets.CDetailView', array(
                'htmlOptions'=>array('class'=>'table table-striped table-bordered'),
                'data'=>$model,
                'attributes'=>array(
                    'NAMA',
                    'EMAIL',
                    'TLP',
                    'FAX',
                    'ALAMAT',
                    'KOTA',
                    'KETERANGAN',
                    array(
                        'name'=>'TERAKHIR_UPDATE',
                        'type'=>'dateFormat',
                        'value'=>$model->TERAKHIR_UPDATE,
                    ),
                ),
        )); ?>
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