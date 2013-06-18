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
			case SurveiPertanyaan::UPLOAD:
				echo CHtml::FileField($model->ID_SURVEI_FORM.'['.$pertanyaan->ID_SURVEI_PERTANYAAN.']');
				break;
			case SurveiPertanyaan::RADIO_FIELD:
				$options = array();
				foreach($pertanyaan->surveiPilihanJawabans as $jawaban){
					$options[$jawaban->ID_SURVEI_JAWABAN] = str_replace('{input}',CHtml::TextField($model->ID_SURVEI_FORM.'['.$pertanyaan->ID_SURVEI_PERTANYAAN.'][\'FIELD\']'),$jawaban->JAWABAN); 
				}
				echo CHtml::radioButtonList($model->ID_SURVEI_FORM.'['.$pertanyaan->ID_SURVEI_PERTANYAAN.'][\'RADIO\']','',$options);
				break;
			case SurveiPertanyaan::CHECKBOX_FIELD:
				$options = array();
				foreach($pertanyaan->surveiPilihanJawabans as $jawaban){
					$options[$jawaban->ID_SURVEI_JAWABAN] = str_replace('{input}',CHtml::TextField($model->ID_SURVEI_FORM.'['.$pertanyaan->ID_SURVEI_PERTANYAAN.'][\'FIELD\'][]'),$jawaban->JAWABAN); 
				}
				echo CHtml::checkBoxList($model->ID_SURVEI_FORM.'['.$pertanyaan->ID_SURVEI_PERTANYAAN.'][\'CHECKBOX\']','',$options);
				break;
		}
	?>
	</td>
	</tr>
		
	<?php
	}?>
</table>
