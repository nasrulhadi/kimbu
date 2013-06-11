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
    <div class="span3">
        <h4 class="heading">Foto User</h4>
        <div class="profilethumb">
            <?php echo $model->displayPicture($model->FOTO);?>
        </div>
    </div>
    <div class="span9">
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
                    'name'=>'PASSWORD',
                    'type'=>'raw',
                    'value'=>CHtml::link('Ubah Password?',array('./user/ubahpassword')),
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