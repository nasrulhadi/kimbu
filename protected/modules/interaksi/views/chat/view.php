<?php
$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Interaksi' => array('/interaksi'),
    'Obrolan' => array('/interaksi/chat'),
    ucwords($model->NAMA),
);
?>

<h3 class="heading">Detail Obrolan</h3>

<div class="row-fluid">
    <div class="span12">
        <div class="chat_box">
            <div class="row-fluid">
                <div class="span8 chat_content">
                    <div class="chat_heading clearfix">
                        <?php echo ucwords($model->NAMA); ?>
                    </div>

                    <div class="msg_window">
                        <div class="chat_msg clearfix msg_clone" style="display:none">
                            <div class="chat_msg_heading"><span class="chat_msg_date"></span><span class="chat_user_name"></span></div>
                            <div class="chat_msg_body"></div>
                        </div>

                        <?php
                        $dataProvider=new CActiveDataProvider('ChatPesan', array(
                            'criteria'=>array(
                                'condition'=>'ID_CHAT = :idChat AND STATUS = 1',
                                'params'=>array('idChat'=>$model->ID_CHAT),
                            ),
                        ));

                        $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$dataProvider,
                            'itemView'=>'_userChat',
                            'template'=>'{items}',
                            'emptyText'=>''
                        ));
                        ?>

                    </div>

                    <div class="chat_editor_box">
                        <textarea name="chat_editor" id="chat_editor" cols="30" rows="3" class="span12"></textarea>
                        <div class="btn-group send_btns">
                            <a href="#" class="btn btn-mini send_msg">Send</a><a href="javascript:void(0)" class="btn btn-mini enter_msg active" data-toggle="button"><i class="icon-adt_enter"></i></a>
                        </div>

                        <input type="hidden" name="chat_user" id="chat_user" value="<?php echo Yii::app()->user->name; ?>" />
                        <input type="hidden" name="chat_id" id="chat_id" value="<?php echo $model->ID_CHAT; ?>" />
                    </div>
                </div>
                <div class="span4 chat_sidebar">
                    <div class="chat_heading clearfix">
                        User Dalam Obrolan
                    </div>
                    <ul class="chat_user_list">
                        <?php
                        $dataProvider=new CActiveDataProvider('ChatUser', array(
                            'criteria'=>array(
                                'condition'=>'ID_CHAT = :idChatUser AND STATUS = 1',
                                'params'=>array('idChatUser'=>$model->ID_CHAT),
                                'order'=>'ID_CHAT_USER ASC',
                            ),
                        ));

                        $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$dataProvider,
                            'itemView'=>'_userOnline',
                            'template'=>'{items}',
                        ));
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

