<?php 
$this->breadcrumbs=array(
    'Dashboard'=>array('/'),
    'Survei'=>array('/surveyor/survei/'),
    'Input'
);
?>

<div class="row-fluid">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'survei-form',
	'enableAjaxValidation'=>false,
	 'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	    <div class="w-box">
            <div class="w-box-header">Survei</div>
            <div class="w-box-content cnt_a">
                <div class="profilethumb">
                    <ul style="list-style-type:none">
						<li>
					<?php echo 'Nama Survei :';?>
					<?php echo $model->NAMA_SURVEI;?>
						</li>
						<li>
					<?php echo 'Keterangan :';?>
					<?php echo $model->KETERANGAN;?>
						</li>
					</ul>
                </div>
            </div>
        </div>
	<div class="w-box">
		<div class="w-box-content cnt_a">
		<div class="profilethumb">
<?php
	$tabs = array();
	foreach($model->surveiForms as $form){
		
		if($form->iDSURVEIGRUP->POSITION == SurveiGrup::TOP){
			$this->renderPartial('_form',array('model'=>$form));
		}
		else if($form->iDSURVEIGRUP->POSITION == SurveiGrup::TAB){
			$tabs[$form->NAMA]=$this->renderPartial('_form',array('model'=>$form),true);
		}
	}
?>
		</div>
		</div>
	</div>
	<div class="w-box">
		<div class="w-box-content cnt_a">
		<div class="profilethumb">
		<?php
		$this->widget('zii.widgets.jui.CJuiTabs',array(
			'tabs'=>$tabs,
			// additional javascript options for the tabs plugin
			'options'=>array(
				'collapsible'=>true,
			),
		));
		?>
		</div>
		</div>
	</div>
<div class="form-actions">
    <button class="btn btn-gebo" type="submit">Simpan</button> 
   <?php echo CHtml::link('Kembali',Yii::app()->createUrl('surveyor/survei/detailsurvei/'.$model->ID_SURVEI), array('class' => 'btn')); ?>
</div>

	

<?php $this->endWidget(); ?>

</div><!-- form -->