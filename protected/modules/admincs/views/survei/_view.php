<?php
/* @var $this ProfileController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<table class="table">
               
	<?php
	$respon_detail_objects = array();
	?>
	<?php 
	

	foreach($model->surveiPertanyaans as $pertanyaan)
	{
	
		
		?>
			 <tr>
			 <td>
			<?php echo CHtml::label($pertanyaan->PERTANYAAN,''); ?>
			<?php 
					
					$pertanyaan_respon = ResponDetail::model()->findByAttributes(array('ID_PERTANYAAN'=>$pertanyaan->ID_SURVEI_PERTANYAAN,'ID_RESPON'=>$respon->ID_RESPON,)); 
					if(!is_null($pertanyaan_respon)){
						$respon_value = json_decode($pertanyaan_respon->RESPON);
						if(is_object($respon_value)){
							$respon_value = (array) $respon_value;
							
						}
						
					}
					else{
						$respon_value = '';
					}
			?>
			</td>
			<td>
			<?php
				switch($pertanyaan->TYPE){
					case SurveiPertanyaan::TEXTFIELD:
						echo CHtml::label($respon_value,'');
						break;
					case SurveiPertanyaan::TEXTAREA:
						echo CHtml::label($respon_value,'');
						break;
					case SurveiPertanyaan::RADIO:
						echo CHtml::label(SurveiPilihanJawaban::model()->findByPk($respon_value)->JAWABAN,'');
						break;
					case SurveiPertanyaan::CHECKBOX:
						foreach($respon_value as $jawaban){
							echo CHtml::label(SurveiPilihanJawaban::model()->findByPk($jawaban)->JAWABAN,'');
						}
						break;
					case SurveiPertanyaan::DROPDOWN:
						echo CHtml::label(SurveiPilihanJawaban::model()->findByPk($respon_value)->JAWABAN,'');
						break;
					case SurveiPertanyaan::UPLOAD:
						echo CHtml::FileField($model->ID_SURVEI_FORM.'['.$pertanyaan->ID_SURVEI_PERTANYAAN.']');
						break;
					case SurveiPertanyaan::RADIO_FIELD:
						echo CHtml::label(str_replace('{input}',$respon_value['FIELD'.$respon_value['RADIO']],SurveiPilihanJawaban::model()->findByPk($respon_value['RADIO'])->JAWABAN),'');
						break;
					case SurveiPertanyaan::CHECKBOX_FIELD:
						foreach($respon_value['CHECKBOX'] as $jawaban){
							echo CHtml::label(str_replace('{input}',$respon_value['FIELD'.$jawaban],SurveiPilihanJawaban::model()->findByPk($jawaban)->JAWABAN),'');
						}
						break;
				}
			?>
			</td>
			</tr>
		
	<?php
		
	}?>
</table>
