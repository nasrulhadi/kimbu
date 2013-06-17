<?php
/* @var $this ProfileController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<table class="table">
               
	<?php
	$respon_detail_objects = array();
	?>
	<?php foreach($model->surveiPertanyaans as $pertanyaan)
	{


	?>
	 <tr>
	 <td>
	<?php echo CHtml::label($pertanyaan->PERTANYAAN,''); ?>
	</td>
	<td>
	<?php
		switch($pertanyaan->TYPE){
			case SurveiPertanyaan::TEXTFIELD:
				echo CHtml::TextField($model->ID_SURVEI_FORM.'['.$pertanyaan->ID_SURVEI_PERTANYAAN.']');
				break;
			case SurveiPertanyaan::TEXTAREA:
				echo CHtml::TextArea($model->ID_SURVEI_FORM.'['.$pertanyaan->ID_SURVEI_PERTANYAAN.']');
				break;
			case SurveiPertanyaan::RADIO:
				echo CHtml::radioButtonList($model->ID_SURVEI_FORM.'['.$pertanyaan->ID_SURVEI_PERTANYAAN.']','',CHtml::ListData($pertanyaan->surveiPilihanJawabans,'ID_SURVEI_JAWABAN','JAWABAN'));
				break;
			case SurveiPertanyaan::CHECKBOX:
				echo CHtml::checkBoxList($model->ID_SURVEI_FORM.'['.$pertanyaan->ID_SURVEI_PERTANYAAN.']','',CHtml::ListData($pertanyaan->surveiPilihanJawabans,'ID_SURVEI_JAWABAN','JAWABAN'));
				break;
			case SurveiPertanyaan::DROPDOWN:
				echo CHtml::dropDownList($model->ID_SURVEI_FORM.'['.$pertanyaan->ID_SURVEI_PERTANYAAN.']','',CHtml::ListData($pertanyaan->surveiPilihanJawabans,'ID_SURVEI_JAWABAN','JAWABAN'));
				break;
		}
	?>
	</td>
	</tr>
		
	<?php
	}?>
</table>
