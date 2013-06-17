<div class="chat_msg clearfix msg_clone" style="display:none">
    <div class="chat_msg_heading"><span class="chat_msg_date"></span><span class="chat_user_name"></span></div>
    <div class="chat_msg_body"></div>
</div>

<?php
$dataProvider = new CActiveDataProvider('ChatPesan', array(
    'criteria' => array(
        'condition' => 'ID_CHAT = :idChat AND STATUS = 1',
        'params' => array(':idChat' => $model->ID_CHAT),
    ),
    'pagination' => false,
        ));

$getListMsg = $dataProvider->getData();

foreach ($getListMsg as $i => $item)
    Yii::app()->controller->renderPartial('_getChatMsg', array('index' => $i, 'data' => $item, 'widget' => $this));
?>