<?php
/* @var $this DivisiController */
/* @var $model Divisi */

$this->pageTitle=Yii::app()->name . ' - Manajemen Divisi';

$this->breadcrumbs=array(
	'Dashboard'=>array('/'),
	'Manajemen Divisi',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#divisi-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3 class="heading">Manajemen Divisi</h3>

<div class="row-fluid">
    <div class="span12">
        <div class="pull-left" style="margin-bottom: 20px;">
            <?php echo CHtml::link('<span class="icon-plus icon-white"></span> Tambah Divisi', array('/root/divisi/create'), array('class' => 'btn btn-gebo')); ?>
            <?php echo CHtml::link('<span class="icon-search"></span> Pencarian','#',array('class'=>'btn search-button')); ?>
        </div>
        </br>
        <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search',array(
            'model'=>$model,
        )); ?>
        </div><!-- search-form -->
        <div class="clearfix"></div>
        <table class="table table-bordered table-striped table_vam" id="divisi">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Logo</th>
                    <th>Nama Divisi</th>
                    <th>Keterangan</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'dataProvider' => $dataProvider,
                    'itemView' => '_view',
                    'template' => '{summary} {pager} {items}',
                ));
                ?>
            </tbody>
        </table>
    </div>
</div>
