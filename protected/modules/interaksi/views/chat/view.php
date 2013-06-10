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

                        <div class="chat_msg clearfix">
                            <div class="chat_msg_heading"><span class="chat_msg_date">12:44</span><span class="chat_user_name">Summer Throssell</span></div>
                            <div class="chat_msg_body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at porta odio. Sed non consectetur neque. Donec nec enim eget ligula tristique scelerisque.</div>
                        </div>

                        <div class="chat_msg clearfix">
                            <div class="chat_msg_heading"><span class="chat_msg_date">12:46</span><span class="chat_user_name">Johny Smith</span></div>
                            <div class="chat_msg_body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at porta odio. Sed non consectetur neque. Donec nec enim eget ligula tristique scelerisque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at porta odio. Sed non consectetur neque. Donec nec enim eget ligula tristique scelerisque.</div>
                        </div>

                    </div>

                    <div class="chat_editor_box">
                        <textarea name="chat_editor" id="chat_editor" cols="30" rows="3" class="span12"></textarea>
                        <div class="btn-group send_btns">
                            <a href="#" class="btn btn-mini send_msg">Send</a><a href="javascript:void(0)" class="btn btn-mini enter_msg active" data-toggle="button"><i class="icon-adt_enter"></i></a>
                        </div>

                        <input type="hidden" name="chat_user" id="chat_user" value="Johny Smith" />
                    </div>
                </div>
                <div class="span4 chat_sidebar">
                    <div class="chat_heading clearfix">
                        User online 2
                    </div>
                    <ul class="chat_user_list">
                        <li class="online active chat_you">
                            <a href="javascript:void(0)">
                                <img src="<?php echo Yii::app()->baseUrl."/images/30x30.gif";?>" alt="" />
                                Johny Smith <span>(you)</span>
                            </a>
                        </li>
                        <li class="online active">
                            <a href="#">
                                <img src="<?php echo Yii::app()->baseUrl."/images/30x30.gif";?>" alt="" />
                                Summer Throssell
                            </a>
                        </li>
                        <li class="online">
                            <a href="#">
                                <img src="<?php echo Yii::app()->baseUrl."/images/30x30.gif";?>" alt="" />
                                Declan Pamphlett
                            </a>
                        </li>
                        <li class="offline">
                            <a href="#">
                                <img src="<?php echo Yii::app()->baseUrl."/images/30x30.gif";?>" alt="" />
                                Erin Church
                            </a>
                        </li>
                        <li class="online">
                            <a href="#">
                                <img src="<?php echo Yii::app()->baseUrl."/images/30x30.gif";?>" alt="" />
                                Koby Auld
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

