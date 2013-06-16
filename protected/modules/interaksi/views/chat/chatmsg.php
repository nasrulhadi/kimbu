<div class="chat_msg clearfix msg_clone" style="display:none">
    <div class="chat_msg_heading"><span class="chat_msg_date"></span><span class="chat_user_name"></span></div>
    <div class="chat_msg_body"></div>
</div>
<?php
$dataProvider = new CActiveDataProvider('ChatPesan', array(
    'criteria' => array(
        'condition' => 'ID_CHAT = :idChat AND STATUS = 1',
        'params' => array('idChat' => $model->ID_CHAT),
    ),
        ));

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_getChatMsg',
    'template' => '{items}',
    'emptyText' => '',
));
?>