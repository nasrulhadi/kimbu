<?php
if (date("Y-m-d", strtotime($data->TANGGAL_DIBUAT)) == date("Y-m-d")) {
    $tanggal_pesan = date("H:i", strtotime($data->TANGGAL_DIBUAT));
} else {
    $tanggal_pesan = date("d/m/Y H:i", strtotime($data->TANGGAL_DIBUAT));
}
?>
<div class="chat_msg clearfix">
    <div class="chat_msg_heading"><span class="chat_msg_date"><?php echo $tanggal_pesan; ?></span><span class="chat_user_name"><?php echo $data->iDUSER->NAMA; ?></span></div>
    <div class="chat_msg_body"><?php echo $data->PESAN; ?></div>
</div>
