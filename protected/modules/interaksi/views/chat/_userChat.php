<li id="user_chat_<?php echo $data->ID_CHAT_USER; ?>" class="online <?php echo $data->ID_USER===Yii::app()->user->getState('idUser')?"active chat_you":""; ?>">
    <a href="javascript:void(0)" style="margin-left: 5px !important;">
        <img src="<?php echo Yii::app()->baseUrl . "/images/30x30.gif"; ?>" alt="" />
        <?php echo ucwords(strtolower($data->iDUSER->NAMA)); ?><span> (<?php echo $data->ID_USER===Yii::app()->user->getState('idUser')?"anda":strtolower($data->iDUSER->USERNAME); ?>)</span>
    </a>
</li>