<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle = Yii::app()->name . ' - Manajemen User Surveyor';

$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'User Surveyor',
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

<h3 class="heading">User Surveyor</h3>

<div class="pull-left" style="margin-bottom: 20px;">
    <?php echo CHtml::link('<span class="icon-plus icon-white"></span> Buat User', array('/admincs/user/create'), array('class' => 'btn btn-gebo')); ?>
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
        array(
            'header' => 'No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
        'NAMA',
        'USERNAME',
        'HP',
        array(
            'name' => 'TERAKHIR_LOGIN',
            'type' => 'dateTimeFormat',
            'value' => '$data->TERAKHIR_LOGIN',
        ),
        array(
            'name' => 'STATUS',
            'type' => 'statusAktif',
            'value' => $model->STATUS,
        ),
        array(
            'name' => 'TERAKHIR_LOGIN',
            'type' => 'dateFormat',
            'value' => $model->TERAKHIR_LOGIN,
        ),
        array(
            'header' => 'Pilihan',
            'class' => 'MyCButtonColumn',
        ),
    ),
));
?>
