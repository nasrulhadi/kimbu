<?php
$this->breadcrumbs = array(
    'Dashboard' => array('/'),
    'Interaksi' => array('/interaksi'),
    'Diskusi' => array('/interaksi/chat'),
    'Riwayat',
);
?>

<h3 class="heading">Riwayat Diskusi</h3>

<div class="row-fluid">
    <div class="span12">
        <div class="chat_box">
            <div class="row-fluid">
                <div class="span8 chat_content">
                    <div class="chat_heading clearfix">
                        Topik : <?php echo ucwords($model->NAMA); ?>
                    </div>

                    <div class="msg_window">
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
                            'pagination'=>false,
                        ));

                        $getListMsg = $dataProvider->getData();
                        foreach ($getListMsg as $i => $item)
                            Yii::app()->controller->renderPartial('_userChat', array('index' => $i, 'data' => $item, 'widget' => $this));
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
                <div class="span4">
                    <div class="chat_sidebar">
                        <div class="chat_heading clearfix">
                            User Dalam Topik
                        </div>
                        <ul class="chat_user_list clearfix">
                            <?php
                            $dataProvider = new CActiveDataProvider('ChatUser', array(
                                'criteria' => array(
                                    'condition' => 'ID_CHAT = :idChatUser AND STATUS = 1',
                                    'params' => array('idChatUser' => $model->ID_CHAT),
                                    'order' => 'ID_CHAT_USER ASC',
                                ),
                            ));

                            $this->widget('zii.widgets.CListView', array(
                                'dataProvider' => $dataProvider,
                                'itemView' => '_userOnline',
                                'template' => '{items}',
                            ));
                            ?>
                        </ul>
                    </div>
                    <div style="margin-top: 20px">
                        <?php if(WebUser::isAdmin()){ ?>
                        <div>
                            <ul class="ov_boxes pull-right">
                                <a href="<?php echo Yii::app()->createUrl('/interaksi/chat/update/'.$model->ID_CHAT); ?>">
                                    <li>
                                        <div class="p_bar_up p_canvas" style="padding: 10px 14px 10px 4px;"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/comment-edit.png"></div>
                                        <div class="ov_text">
                                            <strong style="color:#2f96b4">Update Topik</strong>
                                            <span style="color:#000000">diskusi antar user</span>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div style="margin-top: 20px">
                            <ul class="ov_boxes pull-right">
                                <a href="<?php echo Yii::app()->createUrl('/interaksi/chat/prehapus/'.$model->ID_CHAT); ?>">
                                    <li>
                                        <div class="p_bar_up p_canvas" style="padding: 10px 14px 10px 4px;"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/comment-remove.png"></div>
                                        <div class="ov_text">
                                            <strong style="color:#E2150B">Hapus Topik</strong>
                                            <span style="color:#000000">diskusi antar user</span>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                        <?php } elseif (WebUser::isSurveyor()) { ?>
                        <ul class="ov_boxes pull-right">
                            <a href="<?php echo Yii::app()->createUrl('/interaksi/chat/prehapus/'.$model->ID_CHAT); ?>">
                                <li>
                                    <div class="p_bar_up p_canvas" style="padding: 10px 14px 10px 4px;"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/comment-remove.png"></div>
                                    <div class="ov_text">
                                        <strong style="color:#E2150B">Keluar Topik</strong>
                                        <span style="color:#000000">diskusi antar user</span>
                                    </div>
                                </li>
                            </a>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

