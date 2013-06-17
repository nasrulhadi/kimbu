<?php
$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Interaksi' => array('/interaksi/chat'),
    'Obrolan'
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

<h3 class="heading">Obrolan</h3>
<div class="pull-left" style="margin-bottom: 20px;">
    <?php echo CHtml::link('<span class="icon-plus icon-white"></span> Buat Topik', array('/interaksi/chat/create'), array('class' => 'btn btn-gebo')); ?>
    <?php echo CHtml::link('<span class="icon-search"></span> Pencarian', '#', array('class' => 'btn search-button')); ?>
</div>
</br>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'itemsCssClass' => 'table table-striped table-bordered table-hover',
    'columns' => array(
        'NAMA',
        array(
            'name' => 'STATUS',
            'type' => 'statusAktif',
            'value' => $model->STATUS,
        ),
        array(
            'class' => 'MyCButtonColumn',
        ),
    ),
));
?>
