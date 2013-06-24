<?php

$this->pageTitle=Yii::app()->name . ' - Beranda';

$this->breadcrumbs = array(
    'Dashboard',
);
$baseUrl = Yii::app()->theme->baseUrl;
$siteUrl = Yii::app()->baseUrl;
?>
<h3 class="heading">Hai <?php echo Yii::app()->user->name; ?>, Selamat Datang Kembali :)</h3>
<?php 
$getDivisi = Divisi::model()->findByPk(Yii::app()->user->idDivisi);
?>
<div class="row-fluid">
    <div class="span12">
        <div class="dshb_icoNav tac" style="margin-bottom: 30px;">
            <?php if($getDivisi->LOGO != "" && $getDivisi->LOGO != NULL && $getDivisi->LOGO != "tidakadalogo.jpg"){ ?>
            <img src="<?php echo $siteUrl."/file/logo/divisi/".$getDivisi->LOGO ?>" class="" style="width:300px;" align="middle" alt="<?php echo $getDivisi->NAMA; ?>">
            <?php } ?>
        </div>
        <ul class="dshb_icoNav tac">
            <li><a href="./admincs/user" style="background-image: url(<?php echo $baseUrl; ?>/img/gCons/multi-agents.png)">Users Surveyor</a></li>
            <li><a href="./interaksi/chat" style="background-image: url(<?php echo $baseUrl; ?>/img/gCons/chat-.png)">Obrolan</a></li>
            <li><a href="./admincs/survei" style="background-image: url(<?php echo $baseUrl; ?>/img/gCons/add-item.png)">Survei Toko</a></li>
            <li><a href="./admincs/surveipublik" style="background-image: url(<?php echo $baseUrl; ?>/img/gCons/next-item.png)">Survei Publik</a></li>
        </ul>
    </div>
</div>