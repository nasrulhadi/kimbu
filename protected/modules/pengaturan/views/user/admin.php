<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle=Yii::app()->name . ' - Manajemen User';

$this->breadcrumbs=array(
	'Dashboard'=>array('/'),
    'Manajemen User',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3 class="heading">Manajemen User</h3>

<div class="pull-left" style="margin-bottom: 20px;">
    <?php echo CHtml::link('<span class="icon-plus icon-white"></span> Buat User', array('/pengaturan/user/create'), array('class' => 'btn btn-gebo')); ?>
    <?php echo CHtml::link('<span class="icon-search"></span> Pencarian','#',array('class'=>'btn search-button')); ?>
</div>
</br>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'NAMA',
        'DIVISI',
		'USERNAME',
        array(
            'name'=>'TYPE',
            'type'=>'role',
            'value'=>$model->TYPE,
        ),
		'EMAIL',
        'TLP',
        array(
            'name' => 'STATUS',
            'type' => 'statusAktif',
            'value' => $model->STATUS,
        ),
		array(
			'class'=>'MyCButtonColumn',
		),
	),
)); ?>
